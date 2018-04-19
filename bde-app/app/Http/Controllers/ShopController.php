<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\ArticleCategory;
use Illuminate\Support\Facades\Auth;
use App\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommandConfirm;
use App\Mail\NotifBDE;
use App\User;

class ShopController extends Controller
{
	/*
	 *	List goodies
	 */
    public function index()
    {
    	if(Auth::check()) {
    		$user = Auth::user();
    	}

    	$goodies = Article::all();
    	$categories = ArticleCategory::all();
    	return view('shop.index', compact('user','goodies', 'categories'));
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

    public function command(Request $request)
    {
    	if(Auth::check()) {
    		$user = Auth::user();
    		
    		$basket = $request->all();

    		$recap = [];

    		foreach($basket['basket'] as $key => $item) {
    			$command = new Command();
    			$command->quantity = $item['quantity'];
    			$command->price_total = $item['price']*$item['quantity'];
    			$command->date_order = date('Y-m-d');
    			$command->statut = 'WAIT';
    			$command->id_user = $user->id;
    			$command->id_goodie = $item['id'];
    			$command->save();
    			$command->name = $item['name'];
    			array_push($recap, $command);
                
                $article = Article::find($item['id']);
                $article->stock = $article->stock-1;
                $article->units_sold = $article->units_sold+1;
                $article->save();

    		}

    		$request->session()->forget('basketSaved');

    		$bde = User::all()->where('id_group','=','4')->first();

    		Mail::to($user->mail)->send(new CommandConfirm($recap, $user));
    		Mail::to($bde->mail)->send(new NotifBDE($recap, $user));

    		return "/shop/confirm";
    	}
    	else {
    		return 'nonauth';
    	}
    }

    //API Methods
    public function goodies()
    {
        $articles = Article::all();

        foreach ($articles as $key => $article) {
            $article->category;
        }
    	return $articles;
    }

	
}
