<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\User;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(Request $request){
        
        $firstName = $request->input('first_name');
        $surname = $request->input('surname');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $name = $request->input('name');
        $add = DB::select("CALL ajout_user(?,?,?,?,?)",array($firstName, $surname, $mail, $password,$name));
        return view('RegisterConfirm');
    }

   
}
