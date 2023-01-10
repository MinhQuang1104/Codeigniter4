<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class OrderController extends BaseController
{
    public function __construct()
    {
        $this->customer_model    = model('App\Models\CustomerModel');
        $this->product_model     = model('App\Models\ProductModel');
        $this->generalInfo_model = model('App\Models\GeneralInfoModel');
        $this->color_model       = model('App\Models\ColorModel');
        $this->size_model        = model('App\Models\SizeModel');
        $this->coupon_model      = model('App\Models\CouponModel');
        $this->cart_model        = model('App\Models\CartModel');
        $this->cartProduct_model = model('App\Models\CartProductModel');
        $this->order_model       = model('App\Models\OrderModel');
        $this->orderDetail_model = model('App\Models\OrderDetailModel');
    }

    public function index()
    {
        $data['orders'] = $this->order_model->findAll();

        return view('admin/orders/order', $data);
    }

    public function create()
    {
        $data['products']  = $this->product_model->findAll();
        $data['customers'] = $this->customer_model->findAll();

        return view('admin/orders/create', $data);
    }

    public function getOptionAjax()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
        }

        $options = $this->product_model->getOptionProducts($id);

        return json_encode([
            'option' => $options
        ]);
    }

    public function getPriceOptionAjax()
    {
        if ($this->request->getVar('option_id')) {
            $option_id = $this->request->getVar('option_id');
        } else {
            $option_id = 0;
        }

        $options = $this->product_model->getOptionProductPrice($option_id);
        if ($options) {
            foreach ($options as $option) {
                $price = $option['price'];
            }
        } else {
            if ($this->request->getVar('product_id')) {
                $product_id = $this->request->getVar('product_id');
            }
            $info    = $this->generalInfo_model->find($product_id);
            $product = $this->product_model->find($info['product_id']);
            $price   = $product['price'];
        }

        return json_encode([
            'price' => $price
        ]);
    }

    public function addItemAjax()
    {
        if ($this->request->getPost('product')) {
            $product_id = $this->request->getPost('product');
        }

        if ($this->request->getPost('options')) {
            $option_id = $this->request->getPost('options');
        } else {
            $option_id = 0;
        }

        if ($this->request->getPost('qty')) {
            $qty = $this->request->getPost('qty');
        }

        if ($this->request->getPost('price')) {
            $price = $this->request->getPost('price');
        }

        if ($this->request->getPost('coupon')) {
            $coupon = $this->request->getPost('coupon');
        }

        $p_cart = $this->cart_model->where(['customer_id' => NULL, 'api_id' => 1])->find();
        if (!$p_cart) {
            $data = [
                'api_id'         => 1,
                'customer_id'    => NULL,
                'session_id'     => NULL,
                'coupon_price'   => 0,
                'subtotal'       => 0,
                'shipping_price' => 0,
                'country'        => NULL,
                'city'           => NULL,
                'county'         => NULL,
                'zip'            => NULL,
                'total'          => 0
            ];

            $cart = $this->cart_model->insert($data);
        } else {
            foreach ($p_cart as $item) {
                $cart = $item['id'];
            }
        }

        $product = $this->product_model->find($product_id);

        $products = $this->product_model->getImageProduct($product_id);
        foreach ($products as $productImg) {
            $image = explode(',', $productImg['image']);
        }

        $option = $this->generalInfo_model->find($option_id);
        if ($option) {
            $productColor = $this->color_model->find($option['color_id']);
            $productSize  = $this->size_model->find($option['size_id']);
        } else {
            $productColor['name'] = NULL;
            $productSize['name']  = NULL;
        }

        $data        = [
            'cart_id'          => $cart,
            'product_id'       => $product_id,
            'product_image'    => $image[0],
            'product_name'     => $product['name'],
            'product_color'    => $productColor['name'],
            'product_size'     => $productSize['name'],
            'product_price'    => $price,
            'product_qty'      => $qty,
            'product_subtotal' => $qty * $price
        ];
        $cartProduct = $this->cartProduct_model->insert($data);

        if ($cartProduct) {
            return json_encode([
                'token'    => csrf_hash(),
                'message'  => 'Add item products successfull',
                'id'       => $cartProduct,
                'name'     => $product['name'],
                'color'    => $productColor['name'],
                'size'     => $productSize['name'],
                'qty'      => $qty,
                'price'    => $price,
                'subtotal' => $qty * $price
            ]);
        } else {
            return json_encode([
                'message' => 'Add item products fail'
            ]);
        }
    }

    public function removeItemAjax()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
        }

        $this->cartProduct_model->delete($id);

        return json_encode([
            'message' => 'Removed successfully',
            'id'      => $id
        ]);
    }

    public function addCouponAjax()
    {
        if ($this->request->getVar('coupon')) {
            $coupon = $this->request->getVar('coupon');
        }

        if ($coupon) {
            $coupons = $this->coupon_model->where('code', $coupon)->find();

            if ($coupons) {
                foreach ($coupons as $item) {
                    return json_encode([
                        'message' => 'Your coupon discount has been applied!',
                        'coupon'  => $item['amount_off']
                    ]);
                }
            }
        } else {
            return json_encode([
                'message' => 'Coupon is either invalid, expired or reached its usage limit!',
                'coupon'  => 0
            ]);
        }
    }

    public function addCustomerAjax()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
        }

        $customer = $this->customer_model->find($id);

        if ($customer) {
            return json_encode([
                'customer' => $customer
            ]);
        }
    }
}
