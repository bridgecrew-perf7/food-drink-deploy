<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateUserRequest;
class ManagerUserController extends Controller
{
    public function index()
    {
        $OBJ_Users = User::UserRole()->orderBy('id','desc')->get();
        return view('admin.user.index',compact('OBJ_Users'));
    }

    public function show($id_user)
    {
        $getUserById = User::find($id_user); 
        return view('admin.user.user-detail',compact('getUserById'));
    }

    public function edit($id_user)
    {
        $getUserById = User::find($id_user); 
        return view('admin.user.edit',compact('getUserById'));
    }

    public function getIdUser($id_user)
    {
        return json_encode($id_user);
    }

    public function activeBlockUser(Request $request,$id_user)
    {
        User::find($id_user)->update($request->all()); 
        if($request->has('btn_active')){
            toast(__('custom.Active user successful'),'success');
        }
        else{
            toast(__('custom.Block user successful'),'success');
        }
        return redirect()->back();

    }

    public function update(UpdateUserRequest $request, $id_user)
    {
        DB::beginTransaction();
        try {
            User::find($id_user)->update($request->all()); 
            toast(__('custom.Update user successful'),'success');
            DB::commit(); 
        }
        catch(Exception $ex){
            DB::rollBack();
            toast(__('custom.Update user failure'),'error');
        }
        return redirect()->back();
    }

    public function destroy($id_user)
    {
        DB::beginTransaction();
        try {
            User::destroy($id_user);
            DB::commit();
            toast(__('custom.Delete user successful'),'success');
        }
        catch(Exception $ex){
            DB::rollBack();
            toast(__('custom.Delete user failure'),'error');
        }
        return redirect()->back();
    }
}
