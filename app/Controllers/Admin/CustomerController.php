<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CustomerController extends BaseController
{
    public function __construct()
    {
        $this->customer_model = model('App\Models\CustomerModel');
    }

    public function index()
    {
        $data['customers'] = $this->customer_model->findAll();

        return view('admin/customers/customer', $data);
    }

    public function create()
    {
        return view('admin/customers/create');
    }

    public function store()
    {
        $rules = [
            'first_name' => 'string|required|max_length[60]',
            'last_name'  => 'string|required|max_length[60]',
            'email'      => 'string|required|max_length[50]',
            'password'   => 'required|max_length[60]',
            'confirm'    => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        if ($this->request->getFile('image')) {
            $file = $this->request->getFile('image');

            if ($file->isValid() && !$file->hasMoved()) {
                $name = $file->getClientName();
                $file->move('uploads/users/', $name);
                $image_url = 'uploads/users/'.$name;
            }
        } else {
            $image_url = '';
        }

        $data = [
            'first_name'        => strip_tags($this->request->getPost('first_name')),
            'last_name'         => strip_tags($this->request->getPost('last_name')),
            'email'             => strip_tags($this->request->getPost('email')),
            'email_verified_at' => NULL,
            'password'          => strip_tags(password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)),
            'profile_image'     => $image_url,
            'address'           => strip_tags($this->request->getPost('address')),
            'phone_number'      => strip_tags($this->request->getPost('phone_number')),
        ];

        $this->customer_model->insert($data);

        return redirect()->route('index.customer');
    }

    public function edit($id)
    {
        $data['customer'] = $this->customer_model->find($id);

        return view('admin/customers/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'first_name' => 'string|required|max_length[60]',
            'last_name'  => 'string|required|max_length[60]',
            'email'      => 'string|required|max_length[50]',
            'password'   => 'required|max_length[60]',
            'confirm'    => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        if ($this->request->getFile('image')) {
            $file = $this->request->getFile('image');

            if ($file->isValid() && !$file->hasMoved()) {
                $name = $file->getClientName();
                $file->move('uploads/users/', $name);
                $image_url = 'uploads/users/'.$name;
            }
        } else {
            $image_url = NULL;
        }

        $data = [
            'first_name'        => strip_tags($this->request->getPost('first_name')),
            'last_name'         => strip_tags($this->request->getPost('last_name')),
            'email'             => strip_tags($this->request->getPost('email')),
            'email_verified_at' => NULL,
            'password'          => strip_tags(password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)),
            'profile_image'     => $image_url,
            'address'           => strip_tags($this->request->getPost('address')),
            'phone_number'      => strip_tags($this->request->getPost('phone_number')),
        ];

        $this->customer_model->update($id, $data);

        return redirect()->route('index.customer');
    }

    public function destroy($id)
    {
        $this->customer_model->delete($id);

        return redirect()->route('index.customer');
    }

    public function destroyImage($id)
    {
        $customer = $this->customer_model->find($id);

        if (file_exists($customer['profile_image'])) {
            unlink($customer['profile_image']);
        }

        $data = [
            'first_name'        => $customer['first_name'],
            'last_name'         => $customer['last_name'],
            'email'             => $customer['email'],
            'email_verified_at' => NULL,
            'password'          => $customer['password'],
            'profile_image'     => NULL,
            'address'           => $customer['address'],
            'phone_number'      => $customer['phone_number'],
        ];

        $this->customer_model->update($id, $data);

        return redirect()->back()->with('message', 'Delete Successfully');
    }
}
