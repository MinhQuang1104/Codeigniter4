<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->product_model      = model('App\Models\ProductModel');
        $this->weightType_model   = model('App\Models\WeightTypeModel');
        $this->image_model        = model('App\Models\ImageModel');
        $this->wishList_model     = model('App\Models\WishListModel');
        $this->productTag_model   = model('App\Models\ProductTagModel');
        $this->generalInfo_model  = model('App\Models\GeneralInfoModel');
        $this->tag_model          = model('App\Models\TagModel');
        $this->color_model        = model('App\Models\ColorModel');
        $this->size_model         = model('App\Models\SizeModel');
        $this->category_model     = model('App\Models\CategoryModel');
        $this->discountType_model = model('App\Models\DiscountTypeModel');
    }

    public function index()
    {
        $data = [
            'products' => $this->product_model->getCategoryByProduct()
        ];

        return view('admin/products/product', $data);
    }

    public function create()
    {
        $data = [
            'categories'     => model('App\Models\CategoryModel')->findAll(),
            'discount_types' => model('App\Models\DiscountTypeModel')->findAll(),
            'tags'           => model('App\Models\TagModel')->findAll(),
            'colors'         => model('App\Models\ColorModel')->findAll(),
            'sizes'          => model('App\Models\SizeModel')->findAll(),
            'weight_types'   => model('App\Models\WeightTypeModel')->findAll()
        ];

        return view('admin/products/create', $data);
    }

    public function store()
    {
        $rules = [
            'name'           => 'string|required|max_length[60]',
            'sku'            => 'string|required|max_length[50]',
            'weight'         => 'string|max_length[50]',
            'weight_type_id' => [
                'rules' => 'required',
                'label' => 'unit'
            ],
            'dimension'      => 'string|max_length[50]',
            'price'          => 'required',
            'category_id'    => [
                'rules' => 'required',
                'label' => 'category'
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'name'             => strip_tags($this->request->getPost('name')),
            'sku'              => strip_tags($this->request->getPost('sku')),
            'weight'           => strip_tags($this->request->getPost('weight')),
            'weight_type_id'   => strip_tags($this->request->getPost('weight_type_id')),
            'dimension'        => strip_tags($this->request->getPost('dimension')),
            'description'      => strip_tags($this->request->getPost('description')),
            'price'            => strip_tags($this->request->getPost('price')),
            'old_price'        => strip_tags($this->request->getPost('ole_price')),
            'discount'         => strip_tags($this->request->getPost('discount')),
            'discount_type_id' => $this->request->getPost('discount_type_id'),
            'hot'              => $this->request->getPost('hot') ? '1' : '0',
            'featured'         => $this->request->getPost('featured') ? '1' : '0',
            'size_guide'       => strip_tags($this->request->getPost('size_guide')),
            'additional_info'  => strip_tags($this->request->getPost('additional_info')),
            'status'           => strip_tags($this->request->getPost('status')),
            'category_id'      => $this->request->getPost('category_id')
        ];

        $product_id = $this->product_model->insert($data);

        if ($this->request->getPost('wish')) {
            $this->wishList_model->insert([
                'product_id' => $product_id,
                'status'     => $this->request->getPost('wish') ? 'In stock' : ''
            ]);
        }

        if ($this->request->getPost('tag_id')) {
            foreach ($this->request->getPost('tag_id') as $tag) {
                $this->productTag_model->insert([
                    'product_id' => $product_id,
                    'tag_id'     => $tag
                ]);
            }
        }

        if ($this->request->getPost('product_color_id')) {
            for ($i = 0; $i < count($this->request->getPost('countRow')); $i++) {
                $this->generalInfo_model->insert([
                    'product_id' => $product_id,
                    'color_id'   => $this->request->getPost('product_color_id['.$i.']'),
                    'size_id'    => $this->request->getPost('product_size_id['.$i.']'),
                    'quantity'   => strip_tags($this->request->getPost('quantity['.$i.']')),
                    'price'      => strip_tags($this->request->getPost('price2['.$i.']'))
                ]);
            }
        }

        if ($this->request->getFiles()) {
            $file = $this->request->getFiles();

            foreach ($file['images'] as $imagefile) {
                if ($imagefile->isValid() && !$imagefile->hasMoved()) {
                    $name = $imagefile->getClientName();
                    $imagefile->move('uploads/products/', $name);
                    $image_url = 'uploads/products/'.$name;

                    $this->image_model->insert([
                        'product_id' => $product_id,
                        'image'      => $image_url
                    ]);
                }
            }
        }

        return redirect()->route('index.product');
    }

    public function edit($id)
    {
        $product   = $this->product_model->find($id);
        $wish_list = $this->product_model->checkWishList($id);

        if (count($wish_list) > 0) {
            foreach ($wish_list as $wish) {
                if ($wish['product_id'] == $product['id']) {
                    $data['wishlist_check'] = TRUE;
                    break;
                } else $data['wishlist_check'] = FALSE;
            }
        } else $data['wishlist_check'] = FALSE;

        $tag_ids   = $this->product_model->checkTag($id);
        $tag_check = [];
        foreach ($tag_ids as $tag_id) {
            array_push($tag_check, $tag_id['tag_id']);
        }

        $data['product']        = $product;
        $data['weight_types']   = $this->weightType_model->findall();
        $data['tags']           = $this->tag_model->findAll();
        $data['colors']         = $this->color_model->findAll();
        $data['sizes']          = $this->size_model->findall();
        $data['categories']     = $this->category_model->findall();
        $data['discount_types'] = $this->discountType_model->findall();
        $data['tag_check']      = $tag_check;
        $data['general_info']   = $this->product_model->generalInfo($id);
        $data['images']         = $this->product_model->checkImage($id);

        return view('admin/products/edit', $data);
    }

    public function update($id)
    {
        // dd($this->request->getFiles());

        $rules = [
            'name'           => 'string|required|max_length[60]',
            'sku'            => 'string|required|max_length[50]',
            'weight'         => 'string|max_length[50]',
            'weight_type_id' => [
                'rules' => 'required',
                'label' => 'unit'
            ],
            'dimension'      => 'string|max_length[50]',
            'price'          => 'required',
            'category_id'    => [
                'rules' => 'required',
                'label' => 'category'
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        // $product = $this->product_model->find($id);
        $data = [
            'name'             => strip_tags($this->request->getPost('name')),
            'sku'              => strip_tags($this->request->getPost('sku')),
            'weight'           => strip_tags($this->request->getPost('weight')),
            'weight_type_id'   => strip_tags($this->request->getPost('weight_type_id')),
            'dimension'        => strip_tags($this->request->getPost('dimension')),
            'description'      => strip_tags($this->request->getPost('description')),
            'price'            => strip_tags($this->request->getPost('price')),
            'old_price'        => strip_tags($this->request->getPost('ole_price')),
            'discount'         => strip_tags($this->request->getPost('discount')),
            'discount_type_id' => $this->request->getPost('discount_type_id'),
            'hot'              => $this->request->getPost('hot') ? '1' : '0',
            'featured'         => $this->request->getPost('featured') ? '1' : '0',
            'size_guide'       => strip_tags($this->request->getPost('size_guide')),
            'additional_info'  => strip_tags($this->request->getPost('additional_info')),
            'status'           => strip_tags($this->request->getPost('status')),
            'category_id'      => $this->request->getPost('category_id')
        ];
        $this->product_model->update($id, $data);

        // Update wish list by product id
        $wishRows = $this->product_model->checkWishList($id);
        foreach ($wishRows as $wishRow) {
            $wish_id = $wishRow['id'];
        }
        if ($this->request->getPost('wish')) {
            if (count($wishRows) > 0) {
                $this->wishList_model->update($wish_id, [
                    'status' => $this->request->getPost('wish') ? 'In stock' : ''
                ]);
            } else {
                $this->wishList_model->insert([
                    'product_id' => $id,
                    'status'     => $this->request->getPost('wish') ? 'In stock' : ''
                ]);
            }
        } else {
            if (count($wishRows) > 0) {
                $this->wishList_model->delete($wish_id);
            }
        }

        // Update product tag by product id
        $productTag_id  = [];
        $productTagRows = $this->product_model->checkTag($id);
        foreach ($productTagRows as $productTagRow) {
            array_push($productTag_id, $productTagRow['id']);
        }
        if ($this->request->getPost('tag_id')) {
            if (count($productTagRows) > 0) {
                $this->productTag_model->delete($productTag_id);
                foreach ($this->request->getPost('tag_id') as $tag) {
                    $this->productTag_model->insert([
                        'product_id' => $id,
                        'tag_id'     => $tag
                    ]);
                }
            } else {
                foreach ($this->request->getPost('tag_id') as $tag) {
                    $this->productTag_model->insert([
                        'product_id' => $id,
                        'tag_id'     => $tag
                    ]);
                }
            }
        } else {
            if (count($productTagRows) > 0) {
                $this->productTag_model->delete($productTag_id);
            }
        }

        //Update image by product id
        if ($this->request->getFiles('images')) {
            $file = $this->request->getFiles();

            foreach ($file['images'] as $imagefile) {
                if ($imagefile->isValid() && !$imagefile->hasMoved()) {
                    $name = $imagefile->getClientName();
                    $imagefile->move('uploads/products/', $name);
                    $image_url = 'uploads/products/'.$name;

                    $this->image_model->insert([
                        'product_id' => $id,
                        'image'      => $image_url
                    ]);
                }
            }
        }

        // Update general infomation by product id
        $generalInfo_id  = [];
        $generalInfoRows = $this->product_model->generalInfo($id);
        foreach ($generalInfoRows as $generalInfoRow) {
            array_push($generalInfo_id, $generalInfoRow['id']);
        }
        if ($this->request->getPost('countRow')) {
            for ($i = 0; $i < count($this->request->getPost('countRow')); $i++) {
                $color_id = $this->request->getPost('product_color_id['.$i.']');
                $size_id  = $this->request->getPost('product_size_id['.$i.']');
                $quantity = strip_tags($this->request->getPost('quantity['.$i.']'));
                $price    = strip_tags($this->request->getPost('price2['.$i.']'));
            }

            if ($color_id != "" && $size_id != "" && $quantity != "" && $price != "") {
                if (count($generalInfoRows) > 0) {
                    $this->generalInfo_model->delete($generalInfo_id);

                    for ($i = 0; $i < count($this->request->getPost('product_color_id')); $i++) {
                        $this->generalInfo_model->insert([
                            'product_id' => $id,
                            'color_id'   => $this->request->getPost('product_color_id['.$i.']'),
                            'size_id'    => $this->request->getPost('product_size_id['.$i.']'),
                            'quantity'   => strip_tags($this->request->getPost('quantity['.$i.']')),
                            'price'      => strip_tags($this->request->getPost('price2['.$i.']'))
                        ]);
                    }
                } else {
                    for ($i = 0; $i < count($this->request->getPost('product_color_id')); $i++) {
                        $this->generalInfo_model->insert([
                            'product_id' => $id,
                            'color_id'   => $this->request->getPost('product_color_id['.$i.']'),
                            'size_id'    => $this->request->getPost('product_size_id['.$i.']'),
                            'quantity'   => strip_tags($this->request->getPost('quantity['.$i.']')),
                            'price'      => strip_tags($this->request->getPost('price2['.$i.']'))
                        ]);
                    }
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }

        return redirect()->route('index.product');
    }

    public function destroy($id)
    {
        $this->wishList_model->where('product_id', $id)->delete();
        $this->image_model->where('product_id', $id)->delete();
        $this->productTag_model->where('product_id', $id)->delete();
        $this->generalInfo_model->where('product_id', $id)->delete();
        $this->product_model->where('id', $id)->delete();

        return redirect()->route('index.product');
    }

    public function destroyImage($image_id)
    {
        $product_image = $this->image_model->find($image_id);

        if (file_exists($product_image['image'])) {
            unlink($product_image['image']);
        }

        $this->image_model->delete($image_id);

        return redirect()->back()->with('message', 'Delete Successfully');
    }

//    public function view($id)
//    {
//        $data['product'] = $this->product_model->find($id);
//        $data['images']  = $this->product_model->checkImage($id);
//        $data['image']   = $this->image_model->where('product_id', $id)->first();
//        $data['colors']  = $this->product_model->checkColor($id);
//        $data['sizes']   = $this->product_model->checkSize($id);
//
//        return view('admin/products/view', $data);
//    }

//    public function viewAjax($id)
//    {
//        $color = $this->request->getVar('color');
//        $size  = $this->request->getVar('size');
//
//        $prices = $this->generalInfo_model->where([
//            'color_id' => $color,
//            'size_id'  => $size
//        ])->first();
//
//        if ($prices) {
//            return $this->response->setJSON([
//                'price'   => $prices['price'],
//                'message' => ''
//            ]);
//        } else {
//            $product = $this->product_model->find($id);
//
//            return $this->response->setJSON([
//                'price'   => $product['price'],
//                'message' => 'The product does not have this color or size'
//            ]);
//        }
//    }
}
