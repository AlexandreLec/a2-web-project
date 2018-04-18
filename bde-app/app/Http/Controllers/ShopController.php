<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\ArticleCategory;

class ShopController extends Controller
{
	/*
	 *	List goodies
	 */
    public function index()
    {
    	$goodies = Article::all();
    	$categories = ArticleCategory::all();
    	return view('shop.index', compact('goodies', 'categories'));
    }

    //API Methods
    public function goodies()
    {
    	return Article::all();
    }

	public function retrieveBasket(Request $request)
    {
    	if ($request->session()->has('basketSaved')) {
		    $basket = $request->session()->get('basketSaved');
		    return $basket;
		}
		else {
			return '';
		}
    	
    }

    public function saveBasket(Request $request)
    {
    	$basket = $request->input('basket');
    	$request->session()->put('basketSaved', $basket);
    	return 'ok';
    }
}
