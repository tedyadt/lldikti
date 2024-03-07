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
        $credentials = $request->validate(
            [
                "nip" => 'required|numeric',
                "password" => 'required'
            ],       
        );

        // if(Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'id_role' => '001', 'active_status' => true])){
        //     $request->session()->regenerate();
        //     return redirect()->intended('/s-admin');
        // }else if(Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'id_role' => '002', 'active_status' => true])){
        //     $request->session()->regenerate();
        //     return redirect()->intended('/c-member');
        // }else if(Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'id_role' => '003', 'active_status' => true])){
        //     $request->session()->regenerate();
        //     return redirect()->intended('/o-admin');
        // }else if(Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'id_role' => '004', 'active_status' => true])){
        //     $request->session()->regenerate();
        //     return redirect()->intended('/i-manager');
        // }else if(Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'id_role' => '005', 'active_status' => true])){
        //     $request->session()->regenerate();
        //     return redirect()->intended('/e-treasurer');
        // }else if(Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'id_role' => '006', 'active_status' => true])){
        //     $request->session()->regenerate();
        //     return redirect()->intended('/f-visitor');
        // }

        // return back()->with('loginError', 'Login Failed');
    }


    public function unauthenticate(){
        Auth::logout();
        return redirect('/login');
    }

}
