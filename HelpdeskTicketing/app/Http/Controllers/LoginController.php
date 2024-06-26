<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class LoginController extends Controller
{
    public function login(Request $request)
{
    // Your login logic here

    if (Auth::user()->usertype == '0') {
        return redirect()->route('user.home'); // Redirect regular users
    } else {
        return redirect()->route('admin.home'); // Redirect admins
    }
}
}
