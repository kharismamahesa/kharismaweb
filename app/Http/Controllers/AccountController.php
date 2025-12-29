<?php

namespace App\Http\Controllers;

class AccountController extends Controller
{
    public function profile()
    {
        return view('account.profile');
    }
}
