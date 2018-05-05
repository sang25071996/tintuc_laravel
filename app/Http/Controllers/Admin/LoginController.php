<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function getlogin() {
    	return view('backend.login');
    }
    public function postlogin(Request $request) {
    	$login = array(
    		"email" => $request->txtUser,
    		"password" => $request->txtPass,
    		"level" => 1
    	);
    	if(Auth::attempt($login)) {
    		return redirect()->route('admin.dashboard');
    	}else {
    		return redirect()->route('getlogin');
    	}
    }
    public function logout() {
		Auth::logout();
		return redirect()->route('getlogin');

    }
}
