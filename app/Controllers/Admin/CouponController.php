<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use DateTimeZone;

class CouponController extends BaseController
{
    public function __construct()
    {
        $this->coupon_model             = model('App\Models\CouponModel');
        $this->discountTypeCoupon_model = model('App\Models\DiscountTypeCouponModel');
    }

    public function index()
    {
        $data['coupons'] = $this->coupon_model->findAll();

        return view('admin/coupons/coupon', $data);
    }

    public function create()
    {
        $data['coupon_types'] = $this->discountTypeCoupon_model->findAll();

        return view('admin/coupons/create', $data);
    }

    public function store()
    {
        $rules = [
            'name'               => 'string|required|max_length[60]',
            'code'               => 'string|required|max_length[50]',
            'amount_off'         => 'required',
            'coupon_type_id'     => [
                'rules' => 'required',
                'label' => 'Type'
            ],
            'total'              => 'required',
            'number_of_discount' => 'required',
            'start_date'         => 'required',
            'end_date'           => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'name'                    => strip_tags($this->request->getPost('name')),
            'code'                    => strip_tags($this->request->getPost('code')),
            'amount_off'              => strip_tags($this->request->getPost('amount_off')),
            'discount_type_coupon_id' => strip_tags($this->request->getPost('coupon_type_id')),
            'total'                   => strip_tags($this->request->getPost('total')),
            'number_of_discount'      => strip_tags($this->request->getPost('number_of_discount')),
            'start_date'              => date('Y-m-d H:i:s', strtotime($this->request->getPost('start_date'))),
            'end_date'                => date('Y-m-d H:i:s', strtotime($this->request->getPost('end_date'))),
            'status'                  => $this->request->getPost('status') ? '1' : '0'
        ];

        $this->coupon_model->insert($data);

        return redirect()->route('index.coupon');
    }

    public function edit($id)
    {
        $coupon               = $this->coupon_model->find($id);
        $data['coupon']       = $coupon;
        $data['start_date']   = date('m-d-Y H:i:s', strtotime($coupon['start_date']));
        $data['end_date']     = date('m-d-Y H:i:s', strtotime($coupon['end_date']));
        $data['coupon_types'] = $this->discountTypeCoupon_model->findAll();

        return view('admin/coupons/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'name'               => 'string|required|max_length[60]',
            'code'               => 'string|required|max_length[50]',
            'amount_off'         => 'required',
            'coupon_type_id'     => [
                'rules' => 'required',
                'label' => 'Type'
            ],
            'total'              => 'required',
            'number_of_discount' => 'required',
            'start_date'         => 'required',
            'end_date'           => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'name'                    => strip_tags($this->request->getPost('name')),
            'code'                    => strip_tags($this->request->getPost('code')),
            'amount_off'              => strip_tags($this->request->getPost('amount_off')),
            'discount_type_coupon_id' => strip_tags($this->request->getPost('coupon_type_id')),
            'total'                   => strip_tags($this->request->getPost('total')),
            'number_of_discount'      => strip_tags($this->request->getPost('number_of_discount')),
            'start_date'              => date('Y-m-d H:i:s', strtotime($this->request->getPost('start_date'))),
            'end_date'                => date('Y-m-d H:i:s', strtotime($this->request->getPost('end_date'))),
            'status'                  => $this->request->getPost('status') ? '1' : '0'
        ];

        $this->coupon_model->update($id, $data);

        return redirect()->route('index.coupon');
    }

    public function destroy($id)
    {
        $this->coupon_model->delete($id);

        return redirect()->route('index.coupon');
    }
}
