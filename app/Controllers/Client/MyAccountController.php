<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class MyAccountController extends BaseController
{
    public function index()
    {
        return view('client/profiles/myAccount');
    }
}
