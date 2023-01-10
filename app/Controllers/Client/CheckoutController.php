<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class CheckoutController extends BaseController
{
    public function __construct()
    {
        $this->customer_model    = model('App\Models\CustomerModel');
        $this->cart_model        = model('App\Models\CartModel');
        $this->cartProduct_model = model('App\Models\CartProductModel');
        $this->order_model       = model('App\Models\OrderModel');
        $this->orderDetail_model = model('App\Models\OrderDetailModel');
    }

    public function index()
    {
        $data['carts']         = $this->cart_model->findAll();
        $data['cart_products'] = $this->cartProduct_model->findAll();

        return view('client/products/checkout', $data);
    }

    public function checkout()
    {
        if ($this->request->getPost('firstname')) {
            $firstname = $this->request->getPost('firstname');
        }

        if ($this->request->getPost('lastname')) {
            $lastname = $this->request->getPost('lastname');
        }

        if ($this->request->getPost('company')) {
            $company = $this->request->getPost('company');
        } else {
            $company = '';
        }

        if ($this->request->getPost('country')) {
            $country = $this->request->getPost('country');
        }

        if ($this->request->getPost('address1')) {
            $address1 = $this->request->getPost('address1');
        }

        if ($this->request->getPost('address2')) {
            $address2 = $this->request->getPost('address2');
        }

        if ($this->request->getPost('city')) {
            $city = $this->request->getPost('city');
        }

        if ($this->request->getPost('county')) {
            $county = $this->request->getPost('county');
        }

        if ($this->request->getPost('zip')) {
            $zip = $this->request->getPost('zip');
        }

        if ($this->request->getPost('phone_number')) {
            $phone_number = $this->request->getPost('phone_number');
        }

        if ($this->request->getPost('email')) {
            $email = $this->request->getPost('email');
        }

        if ($this->request->getPost('firstname2')) {
            $firstname2 = $this->request->getPost('firstname2');
        }

        if ($this->request->getPost('lastname2')) {
            $lastname2 = $this->request->getPost('lastname2');
        }

        if ($this->request->getPost('company2')) {
            $company2 = $this->request->getPost('company2');
        } else {
            $company2 = '';
        }

        if ($this->request->getPost('country2')) {
            $country2 = $this->request->getPost('country2');
        }

        if ($this->request->getPost('address3')) {
            $address3 = $this->request->getPost('address3');
        }

        if ($this->request->getPost('address4')) {
            $address4 = $this->request->getPost('address4');
        }

        if ($this->request->getPost('city2')) {
            $city2 = $this->request->getPost('city2');
        }

        if ($this->request->getPost('county2')) {
            $county2 = $this->request->getPost('county2');
        }

        if ($this->request->getPost('zip2')) {
            $zip2 = $this->request->getPost('zip2');
        }

        if ($this->request->getPost('note')) {
            $note = $this->request->getPost('note');
        } else {
            $note = '';
        }

        $carts = $this->cart_model->findAll();
        if ($carts) {
            foreach ($carts as $cart) {
                $cus_id = $cart['customer_id'];
                if ($cus_id) {
                    $customer = $this->customer_model->find($cus_id);

                    $data = [
                        'customer_id'        => $cart['customer_id'],
                        'first_name'         => $customer['first_name'],
                        'last_name'          => $customer['last_name'],
                        'email'              => $customer['email'],
                        'phone_number'       => $customer['phone_number'],
                        'subtotal'           => $cart['subtotal'],
                        'amount_off'         => $cart['coupon_price'],
                        'total_price'        => $cart['total'],
                        'transport_fee'      => $cart['shipping_price'],
                        'shipping_method'    => $cart['shipping_price'] == 0 ? '0' : '1',
                        'shipping_firstname' => $firstname2 != '' ? $firstname2 : $cart['firstname'],
                        'shipping_lastname'  => $lastname2 != '' ? $lastname2 : $cart['lastname'],
                        'shipping_company'   => $company2,
                        'shipping_address'   => $address3.', '.$address4,
                        'shipping_city'      => $city2 != '' ? $city2 : $cart['city'],
                        'shipping_country'   => $country2 != '' ? $country2 : $cart['country'],
                        'shipping_county'    => $county2 != '' ? $county2 : $cart['county'],
                        'shipping_postcode'  => $zip2 != '' ? $zip2 : $cart['zip'],
                        'payment_method'     => '',
                        'payment_firstname'  => $firstname,
                        'payment_lastname'   => $lastname,
                        'payment_company'    => $company,
                        'payment_country'    => $country,
                        'payment_address'    => $address1.', '.$address2,
                        'payment_city'       => $city,
                        'payment_county'     => $county,
                        'payment_postcode'   => $zip,
                        'payment_email'      => $email,
                        'payment_phone'      => $phone_number,
                        'note'               => $note,
                        'status'             => 1
                    ];

                    $order_id = $this->order_model->insert($data);

                } else {
                    $data = [
                        'customer_id'        => NULL,
                        'first_name'         => '',
                        'last_name'          => '',
                        'email'              => '',
                        'phone_number'       => '',
                        'subtotal'           => $cart['subtotal'],
                        'amount_off'         => $cart['coupon_price'],
                        'total_price'        => $cart['total'],
                        'transport_fee'      => $cart['shipping_price'],
                        'shipping_method'    => $cart['shipping_price'] == 0 ? '0' : '1',
                        'shipping_firstname' => $firstname2 != '' ? $firstname2 : $cart['firstname'],
                        'shipping_lastname'  => $lastname2 != '' ? $lastname2 : $cart['lastname'],
                        'shipping_company'   => $company2,
                        'shipping_address'   => $address3.', '.$address4,
                        'shipping_city'      => $city2 != '' ? $city2 : $cart['city'],
                        'shipping_country'   => $country2 != '' ? $country2 : $cart['country'],
                        'shipping_county'    => $county2 != '' ? $county2 : $cart['county'],
                        'shipping_postcode'  => $zip2 != '' ? $zip2 : $cart['zip'],
                        'payment_method'     => '',
                        'payment_firstname'  => $firstname,
                        'payment_lastname'   => $lastname,
                        'payment_company'    => $company,
                        'payment_country'    => $country,
                        'payment_address'    => $address1.', '.$address2,
                        'payment_city'       => $city,
                        'payment_county'     => $county,
                        'payment_postcode'   => $zip,
                        'payment_email'      => $email,
                        'payment_phone'      => $phone_number,
                        'note'               => $note,
                        'status'             => 1
                    ];

                    $order_id = $this->order_model->insert($data);
                }

                if ($order_id) {
                    $cart_products = $this->cartProduct_model->findAll();
                    if ($cart_products) {
                        foreach ($cart_products as $cart_product) {
                            $data = [
                                'product_id' => $cart_product['product_id'],
                                'order_id'   => $order_id,
                                'image'      => $cart_product['product_image'],
                                'name'       => $cart_product['product_name'],
                                'color'      => $cart_product['product_color'],
                                'size'       => $cart_product['product_size'],
                                'price'      => $cart_product['product_price'],
                                'quantity'   => $cart_product['product_qty'],
                                'subtotal'   => $cart_product['product_subtotal']
                            ];

                            $orderDetail_id = $this->orderDetail_model->insert($data);
                        }
                        if ($orderDetail_id) {
                            return json_encode([
                                'message' => 'You have checkout successfully'
                            ]);
                        } else {
                            return json_encode([
                                'error' => 'You have checkout failed'
                            ]);
                        }
                    }
                } else {
                    return json_encode([
                        'error' => 'You have checkout failed'
                    ]);
                }
            }
        }
    }
}
