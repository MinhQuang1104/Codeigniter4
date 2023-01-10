<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class AuthenticationClientController extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->customer_model = model('App\Models\CustomerModel');
    }

    public function index()
    {
        if (isset($_COOKIE['login-email']) && isset($_COOKIE['login-password'])) {
            $data =
                $this->customer_model->where(['email' => $_COOKIE['login-email']], ['password' => $_COOKIE['login-password']])
                                     ->first();

            if ($data) {
                $session  = session();
                $ses_data = [
                    'client_id'        => $data['id'],
                    'name'             => $data['first_name'],
                    'email'            => $data['email'],
                    'clientIsLoggedIn' => TRUE
                ];

                $session->set($ses_data);

                return redirect()->back();
            }
        }

        return view('client/auth/login_client');
    }

    public function clientLogin()
    {
//        $session = session();

        $email    = $this->request->getPost('login-email');
        $password = $this->request->getPost('login-password');
        $remember = $this->request->getPost('lost-password');

        $data = $this->customer_model->where('email', $email)->first();

        if ($data) {
            $pass                 = $data['password'];
            $authenticatePassword = password_verify($password, $pass);

            if ($authenticatePassword) {
                $ses_data = [
                    'client_id'        => $data['id'],
                    'name'             => $data['first_name'],
                    'email'            => $data['email'],
                    'clientIsLoggedIn' => TRUE
                ];

                $this->session->set($ses_data);

                if ($remember) {
                    setcookie('login-email', $email, time() + (86400 * 30), "/");
                    setcookie('login-password', $password, time() + (86400 * 30), "/");
                }

                return redirect()->route('product-index');
            } else {
                $this->session->setFlashdata('message', 'Password is incorrect.');

                return view('client/auth/login_client');
            }
        } else {
            $this->session->setFlashdata('message', 'Email does not exist.');

            return view('client/auth/login_client');
        }
    }

    public function clientLogout()
    {

        if ($this->session->get('client_id')) {
            $this->session->sess_destroy();

            if (isset($_COOKIE['login-email']) && isset($_COOKIE['login-password'])) {
                unset($_COOKIE['login-email']);
                setcookie('login-email', NULL, 1, '/');

                unset($_COOKIE['login-password']);
                setcookie('login-password', NULL, 1, '/');

                return view('client/auth/login_client');
            }
        }

        return view('client/auth/login_client');
    }
}
