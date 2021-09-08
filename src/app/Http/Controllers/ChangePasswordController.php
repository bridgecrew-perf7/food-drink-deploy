<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
class ChangePasswordController extends Controller
{
    public function changePassword(ChangePasswordRequest $request){
        try{
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            toast(__('custom.change_password_success'),'success');
        }
        catch(Exception $ex){
            toast(__('custom.change_password_error'),'error');
        }
        return redirect()->back();

    }
}
