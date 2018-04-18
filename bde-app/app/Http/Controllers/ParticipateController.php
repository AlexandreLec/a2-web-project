<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 

class ParticipateController extends Controller
{
    public function participate(){
        if(Auth::check()) {
       $participate = Participate::all();
       return $participate;
}
}
}

