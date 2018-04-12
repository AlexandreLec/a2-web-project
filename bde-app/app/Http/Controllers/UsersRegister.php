<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersRegister extends Controller
{
    public function create(){
        return view('register');
    }

    public function post(Request $request){
        
    }
}
