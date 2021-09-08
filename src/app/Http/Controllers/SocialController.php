<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use Validator,Redirect,Response,File;
 use Socialite;
 use App\Models\User;
 
 class SocialController extends Controller{
    public function redirect($provider){

        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider){
        $getInfo = Socialite::driver($provider)->user(); 
        $user = $this->createUser($getInfo,$provider); 
        auth()->login($user); 
        return redirect()->to('/home');
    }
    function createUser($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            try{
                $user = User::create([
                    'name'     => $getInfo->name,
                    'email'    => $getInfo->email,
                    'password' => bcrypt(env('PASSWORD_USER_CREATE_SOCIAL')),
                    'provider' => $provider,
                    'provider_id' => $getInfo->id,
                    'status' => 1,
                ]);
            }
            catch(Exception $e){
                return back()->withErrors(__('custom.Login_error'))->withInput();
            }
        }
        return $user;
    }
 }