<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class Events extends Controller
{
    public function index(){
    	if(Auth::check()) {
    		$user = Auth::user();
    	}

    	return view('events', compact('user'));
    }
}
