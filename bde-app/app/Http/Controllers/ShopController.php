<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
	/*
	 *	List goodies
	 */
    public function index()
    {
    	return view('shop.index');
    }
}
