<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(Request $request){
        
        $firstName = $request->input('Name');
        $surname = $request->input('Surname');
        $mail = $request->input('Mail');
        $password = $request->input('Password');
        $name = $request->input('Grade');
        $password = Hash::make($password);
        $add = DB::select("CALL ajout_user(?,?,?,?,?)",array($firstName, $surname, $mail, $password,$name));
        return view('RegisterConfirm');
    }

   
}
