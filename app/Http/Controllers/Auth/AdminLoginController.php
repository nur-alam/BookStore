<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{


	public function __construct()
	{
		$this->middleware('guest:admin', ['except' => ['logout']]);
	}


	public function showLoginFrom()
	{
		return view('auth.admin-login');
	}


	public function login(Request $request)
	{

		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:6'
		]);

		$credentials = [
			'email' => $request->email,
			'password' => $request->password
		];

		//dd($request->all());

		if( Auth::guard('admin')->attempt($credentials,$request->remember) ){
			return redirect()->intended(route('admin.home'));
		}		

		return redirect()->back()->withInput($request->only('email','password'));

	}


	public function logout(Request $request)
    {
        //$this->guard()->logout();
        Auth::guard('admin')->logout();

        //$request->session()->invalidate();

        return redirect(route('admin.login'));
    }

   
}
