<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ArticleCategory;

class ArticleCategoryController extends Controller
{
    public function create(Request $request) {
        if(Auth::check()){
            $user = Auth::user();
            if($user->group->id === 4){
                $category = new ArticleCategory();
                $category->name = $request->input('goodie-category');
                $category->save();
                 return redirect('/admin');
            }
            return view ('mustconnect');
        }
        return view ('mustconnect');
    }

    public function delete($id){
        if(Auth::check()) {
            $user = Auth::user();
            if($user->group->id === 4){
                ArticleCategory::find($id)->delete();
                return 'ok';
            }
        }
        return 'refused';
    }

    //API methods
    public function index(){
        return ArticleCategory::all();
    }
}
