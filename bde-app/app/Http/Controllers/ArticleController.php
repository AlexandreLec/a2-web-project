<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\Article;
use App\ArticleCategory;

class ArticleController extends Controller
{
    
    public function create() {
        if(Auth::check()){
            
            $user = Auth::user();
            if($user->group->id === 4){
                $categories = ArticleCategory::all();
                return view('article', compact('user','categories'));
            }
            return view ('mustconnect');
        }
        return view ('mustconnect');
    }
    
    public function store(Request $request) {
        
        //Check if authentified
        if(Auth::check()){
            
            $user = Auth::user();
            //model contaning the form data to input
            $article = new Article;

            $article->name = $request->name;
            $article->description = $request->description;
            $article->price = $request->price;
            $article->id_category = $request->category;
            $article->stock = $request->stock;

                $file = $request->file('picture');
                    $destinationPath = $request->file('picture')->store('/users_upload/goodies', 'public');
                 
                    $article->url_img = '/storage/'.$destinationPath;
            
                    $article->save();
                    
                    return view('ArticleConfirm', compact('user'));
        }

        return view ('mustconnect');
    }
}