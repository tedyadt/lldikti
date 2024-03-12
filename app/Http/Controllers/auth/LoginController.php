<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index(){
        return view('auth.login');
    }
   

    public function authenticate(Request $request){
        try{
            $credentials = $request->validate(
                [
                    "nip_or_email_field" => 'required',
                    "password" => 'required'
                ],       
            );

            if(
                Auth::attempt(['email' => $credentials['nip_or_email_field'], 'password' => $credentials['password'],'is_active' => 1]) 
                ||Auth::attempt(['nip' => $credentials['nip_or_email_field'], 'password' => $credentials['password'],'is_active' => 1])
            ){
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }

            return back()->with('loginError', 'Login Failed');
            
        }catch(\Exception $e){
            return back()->with('loginError', 'Login Failed');
            // return back()->with('loginError', $e->getMessage());
        }

    }


    public function unauthenticate(){
        Auth::logout();
        return redirect('/login');
    }

}
