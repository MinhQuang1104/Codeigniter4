<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AuthenticationController extends BaseController
{
    public function home()
    {
        return redirect()->route('login');
    }

    public function index()
    {
        if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
            $userModel = model('App\Models\UserModel');

            $data = $userModel->where(['email' => $_COOKIE['email']], ['password' => $_COOKIE['password']])->first();

            if ($data) {
                $session  = session();
                $ses_data = [
                    'id'         => $data['id'],
                    'name'       => $data['firstname'],
                    'email'      => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);

                // return redirect()->route('dashboard');
                return view('admin/index');
            }
        }

        return view('admin/auth/login');
    }

    public function userLogin()
    {
        $session   = session();
        $userModel = model('App\Models\UserModel');

        $email    = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $remember = $this->request->getVar('remember');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass                 = $data['password'];
            $authenticatePassword = password_verify($password, $pass);

            if ($authenticatePassword) {
                $ses_data = [
                    'id'         => $data['id'],
                    'name'       => $data['firstname'],
                    'email'      => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);

                if ($remember) {
                    setcookie('email', $email, time() + (86400 * 30), "/");
                    setcookie('password', $password, time() + (86400 * 30), "/");
                }

                return view('admin/index');
            } else {
                $session->setFlashdata('message', 'Password is incorrect.');

                return view('admin/auth/login');
            }
        } else {
            $session->setFlashdata('message', 'Email does not exist.');

            return view('admin/auth/login');
        }
    }

    public function userLogout()
    {
        if (session()) {
            session_destroy();

            if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                unset($_COOKIE['email']);
                setcookie('email', NULL, 1, '/');

                unset($_COOKIE['password']);
                setcookie('password', NULL, 1, '/');

                return view('admin/auth/login');
            }
        }

        return view('admin/auth/login');
    }
}
