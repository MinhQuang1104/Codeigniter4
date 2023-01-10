<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->product_model     = model('App\Models\ProductModel');
        $this->image_model       = model('App\Models\ImageModel');
        $this->generalInfo_model = model('App\Models\GeneralInfoModel');
    }

    public function index()
    {
        $products = $this->product_model->testImageProduct();
        foreach ($products as $product) {
            $product['image'] = explode(',', $product['image']);
            $list_item[]      = $product;
        }
        $data['products'] = $list_item;

        return view('client/home', $data);
    }

    public function clientView($id)
    {
        $data['product']    = $this->product_model->find($id);
        $data['images']     = $this->product_model->checkImage($id);
        $data['image']      = $this->image_model->where('product_id', $id)->first();
        $data['colors']     = $this->product_model->checkColor($id);
        $data['sizes']      = $this->product_model->checkSize($id);
        $data['categories'] = $this->product_model->getCategoryById($id);
        $tags               = $this->product_model->checkTagById($id);
        $tagName            = [];
        foreach ($tags as $tag) {
            array_push($tagName, $tag['name']);
        }
        $data['tag'] = $tagName;

        return view('client/products/product_detail', $data);
    }

    public function viewAjax($id)
    {
        $color = $this->request->getVar('color');
        $size  = $this->request->getVar('size');

        $prices = $this->generalInfo_model->where(['product_id' => $id,
                                                   'color_id'   => $color,
                                                   'size_id'    => $size])->first();

        if ($prices) {
            return $this->response->setJSON([
                'price'   => $prices['price'],
                'message' => ''
            ]);
        } else {
            $product = $this->product_model->find($id);

            return $this->response->setJSON([
                'price'   => $product['price'],
                'message' => 'The product does not have this color or size'
            ]);
        }
    }
}
