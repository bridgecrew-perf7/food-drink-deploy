<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('check_user');
    }

    public function login(){
    
        return view('admin.login');
    }
}