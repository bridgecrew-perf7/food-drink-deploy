<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\UserRole;
use Auth;
class LogoutController extends Controller
{
    public function logout(){
        if(Auth::user()->role == UserRole::getKey(UserRole::ADMIN)){
            Auth::logout();
            return redirect('/admin');
        }
        else{
            Auth::logout();
            return redirect('/home');
        }
    }
}