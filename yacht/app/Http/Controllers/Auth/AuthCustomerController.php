<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Marinas;
use Illuminate\Support\Facades\Session;
use App\Models\Styles;
use App\Models\Yachts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class AuthCustomerController extends Controller
{
    public function login(){
        $marina = Marinas::get();
        $style = Styles::get();
        $yacht = Yachts::get();
        return view('pages.login.login')->with(['yacht' => $yacht, 'style' => $style,'marina'=>$marina]);
    }

    public function customer_login(Request $request){
        $customer = Customers::where('customer_email',$request->customer_email)->where('password',md5($request->customer_password))->first();
        if($customer){
            Auth::login($customer);
            $user = Auth::id();
            return Redirect::to('/home')->with('user',$user);
        }

        session::put('message','Wrong Email or Password. Please, re-enter');
        return Redirect::to('/login');
    }
    public function log_out(){
        Auth::logout();
        return Redirect::to('/home');
    }

    public function account($id, Request $request){
        $user = Customers::where('id',$id)->get();
        return view('pages.account.profile')->with('user',$user);
    }
}
