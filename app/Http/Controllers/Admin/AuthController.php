<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function  getLogin(){

        return view('admin.auth.login');
    }

    public function login(LoginRequest $request){


        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
            toastr()->success( 'You have signed in successfully');
            return redirect() -> route('admin.dashboard');
        }
        toastr()->error( 'These data is incorrect');

        return redirect()->back();
    }

    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect()->route('get.admin.login');
    }
}
