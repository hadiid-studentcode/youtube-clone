<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('pages.login',[
            'title' => 'Login',
        ]);
    }

    public function register(){
        return view('pages.register',[
            'title' => 'Register',
        ]);
    }
}
