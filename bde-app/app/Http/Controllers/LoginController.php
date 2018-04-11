<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class LoginController extends Controller
{
	
    public function index(){
    	if(Auth::check()) {
    		$user = Auth::user();
    	}
    	return view('welcome', compact('user'));
    }

    public function login(Request $request){
    	$login = $request->input('login');
    	$pass = $request->input('password');
    	Auth::attempt(['mail' => $login, 'password' => $pass]);
    	return $this->index();
    }

    public function logout(){
    	Auth::logout();
    	return $this->index();
    }
}
