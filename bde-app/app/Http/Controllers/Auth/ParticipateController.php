<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ParticipateController extends Controller
{

public function create()
    {
        return view('participate');
    }
}