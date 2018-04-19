<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\Article;

class ArticleController extends Controller
{
    //return the page for add an article
    public function create() {
        return view('article');
    }
    
    //add a new article on the BDD
    public function store(Request $request) {
        
        //Check if authentified
        if(Auth::check()){
            
            //model contaning the form data to input
            $article = new Article;

            $article->name = $request->name;
            $article->description = $request->description;
            $article->price = $request->price;
            $article->id_category = $request->category;

                $file = $request->file('picture');
                    $destinationPath = $request->file('picture')->store('/users_upload/goodies', 'public');
                 
                    $article->url_img = '/storage/'.$destinationPath;
            
                    $article->save();
                    
                    return view('ArticleConfirm');
        }
    }
}