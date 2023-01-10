<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class CartController extends BaseController
{

    public function __construct()
    {
        $this->product_model     = model('App\Models\ProductModel');
        $this->color_model       = model('App\Models\ColorModel');
        $this->size_model        = model('App\Models\SizeModel');
        $this->generalInfo_model = model('App\Models\GeneralInfoModel');
        $this->image_model       = model('App\Models\ImageModel');
        $this->cart_model        = model('App\Models\CartModel');
        $this->cartProduct_model = model('App\Models\CartProductModel');
        $this->customer_model    = model('App\Models\CustomerModel');
        $this->coupon_model      = model('App\Models\CouponModel');
    }

    public function index()
    {
        $carts = $this->cart_model->findAll();
        if (count($carts) > 0) {
            foreach ($carts as $cart) {
                $data['id'] = $cart['id'];
            }
        } else {
            $data['id'] = 0;
        }

        $cartProducts = $this->cartProduct_model->findAll();
        $subtotal     = 0;
        foreach ($cartProducts as $cartProduct) {
            $subtotal += $cartProduct['product_subtotal'];
        }

        $data['cart_products'] = $cartProducts;
        $data['subtotal']      = $subtotal;

        return view('client/products/product_cart', $data);
    }

    public function addToCart($id)
    {
        $session = session();

        if ($session->get('clientIsLoggedIn') == TRUE) {
            if ($this->request->getVar('qty')) {
                $qty = $this->request->getVar('qty');
            }

            if ($this->request->getVar('price')) {
                $price = $this->request->getVar('price');
            }

            if ($this->request->getVar('color')) {
                $color = $this->request->getVar('color');
            }

            if ($this->request->getVar('size')) {
                $size = $this->request->getVar('size');
            }

            $p_cart = $this->cart_model->where(['customer_id' => $session->get('client_id'), 'api_id' => 0])->find();
            if (!$p_cart) {
                $data = [
                    'api_id'         => 0,
                    'customer_id'    => $session->get('client_id'),
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

            $product  = $this->product_model->find($id);
            $products = $this->product_model->getImageProduct($id);
            foreach ($products as $productImg) {
                $image = explode(',', $productImg['image']);
            }

            $generalInfo = $this->generalInfo_model->where(['product_id' => $id,
                                                            'color_id'   => $color,
                                                            'size_id'    => $size])->find();
            foreach ($generalInfo as $item) {
                $productColor = $this->color_model->find($item['color_id']);
                $productSize  = $this->size_model->find($item['size_id']);
            }

            $data        = [
                'cart_id'          => $cart,
                'product_id'       => $id,
                'product_image'    => $image[0],
                'product_name'     => $product['name'],
                'product_color'    => isset($productColor['name']) ? $productColor['name'] : NULL,
                'product_size'     => isset($productSize['name']) ? $productSize['name'] : NULL,
                'product_price'    => $price,
                'product_qty'      => $qty,
                'product_subtotal' => $qty * $price
            ];
            $cartProduct = $this->cartProduct_model->insert($data);

            if ($cartProduct) {
                return $this->response->setJSON([
                    'product_name' => $product['name'],
                    'message_1'    => 'has been added to your cart.'
                ]);
            } else {
                return $this->response->setJSON([
                    'product_name' => $product['name'],
                    'message_1'    => 'add into order not success'
                ]);
            }
        } else {
            if ($this->request->getVar('qty')) {
                $qty = $this->request->getVar('qty');
            }

            if ($this->request->getVar('price')) {
                $price = $this->request->getVar('price');
            }

            if ($this->request->getVar('color')) {
                $color = $this->request->getVar('color');
            }

            if ($this->request->getVar('size')) {
                $size = $this->request->getVar('size');
            }

            $p_cart = $this->cart_model->where(['customer_id' => NULL, 'api_id' => 0])->find();
            if (!$p_cart) {
                $data = [
                    'api_id'         => 0,
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

            $product  = $this->product_model->find($id);
            $products = $this->product_model->getImageProduct($id);
            foreach ($products as $productImg) {
                $image = explode(',', $productImg['image']);
            }

            $generalInfo = $this->generalInfo_model->where(['product_id' => $id,
                                                            'color_id'   => $color,
                                                            'size_id'    => $size])->find();
            foreach ($generalInfo as $item) {
                $productColor = $this->color_model->find($item['color_id']);
                $productSize  = $this->size_model->find($item['size_id']);
            }

            $data        = [
                'cart_id'          => $cart,
                'product_id'       => $id,
                'product_image'    => $image[0],
                'product_name'     => $product['name'],
                'product_color'    => isset($productColor['name']) ? $productColor['name'] : NULL,
                'product_size'     => isset($productSize['name']) ? $productSize['name'] : NULL,
                'product_price'    => $price,
                'product_qty'      => $qty,
                'product_subtotal' => $qty * $price
            ];
            $cartProduct = $this->cartProduct_model->insert($data);

            if ($cartProduct) {
                return $this->response->setJSON([
                    'product_name' => $product['name'],
                    'message_1'    => 'has been added to your cart.'
                ]);
            } else {
                return $this->response->setJSON([
                    'product_name' => $product['name'],
                    'message_1'    => 'add into order not success'
                ]);
            }
        }
    }

    public function addCoupon()
    {
        if ($this->request->getVar('coupon')) {
            $coupon = $this->request->getVar('coupon');

            $discount = $this->coupon_model->where('code', $coupon)->find();

            $total = 0;
            if ($discount) {
                foreach ($discount as $item) {
                    $total += $item['total'];
                }

                return $this->response->setJSON([
                    'discount' => $total
                ]);
            }
        }
    }

    public function updateQuantity()
    {
        $products = $this->request->getVar('product');

        foreach ($products as $product) {
            $product_cart = $this->cartProduct_model->where('id', $product[0])->find();
            foreach ($product_cart as $item) {
                $data = [
                    'cart_id'          => $item['cart_id'],
                    'product_id'       => $item['product_id'],
                    'product_image'    => $item['product_image'],
                    'product_name'     => $item['product_name'],
                    'product_color'    => $item['product_color'],
                    'product_size'     => $item['product_size'],
                    'product_price'    => $item['product_price'],
                    'product_qty'      => $product[1],
                    'product_subtotal' => $product[1] * $item['product_price']
                ];
            }

            $this->cartProduct_model->update($product[0], $data);
        }

        return json_encode(['message' => 'You have modified your shopping cart']);
    }

    public function addShipping()
    {
        if ($this->request->getVar('flat_rate')) {
            $flat_rate = $this->cart_model->shippingPrice();
        }

        $weight = 0;
        if (count($flat_rate) > 0) {
            foreach ($flat_rate as $priceShipping) {
                if ($priceShipping['unit'] == 'kg') {
                    $weight += $priceShipping['weight'];
                } else {
                    $weight += $priceShipping['weight'] / 1000;
                }
            }
        }
        // 1kg = $0.2
        $data['flat_rate'] = $weight * 0.2 + 1;

        return $this->response->setJSON(['flat_rate' => $data['flat_rate']]);
    }

    public function updateCart($id)
    {
        if ($this->request->getVar('coupon')) {
            $coupon = $this->request->getVar('coupon');
        } else {
            $coupon = 0;
        }

        if ($this->request->getVar('subtotal')) {
            $subtotal = $this->request->getVar('subtotal');
        }

        if ($this->request->getVar('shipping')) {
            $shipping = $this->request->getVar('shipping');
        } else {
            $shipping = 0;
        }

        if ($this->request->getVar('country')) {
            $country = $this->request->getVar('country');
        }

        if ($this->request->getVar('city')) {
            $city = $this->request->getVar('city');
        }

        if ($this->request->getVar('county')) {
            $county = $this->request->getVar('county');
        } else {
            $county = '';
        }

        if ($this->request->getVar('zip')) {
            $zip = $this->request->getVar('zip');
        } else {
            $zip = '';
        }

        if ($this->request->getVar('total')) {
            $total = $this->request->getVar('total');
        }

        $cart = $this->cart_model->find($id);

        $data = [
            'api_id'         => $cart['api_id'],
            'customer_id'    => $cart['customer_id'],
            'session_id'     => $cart['session_id'],
            'coupon_price'   => $coupon,
            'subtotal'       => $subtotal,
            'shipping_price' => $shipping,
            'country'        => $country,
            'city'           => $city,
            'county'         => $county,
            'zip'            => $zip,
            'total'          => $total
        ];

        $this->cart_model->update($id, $data);

        return json_encode([
            'message' => 'You have added to checkout'
        ]);
    }

    public function removeCart()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
        }

        $this->cartProduct_model->where('id', $id)->delete();

        return json_encode([
            'message' => 'You have removed product from cart'
        ]);
    }
}
