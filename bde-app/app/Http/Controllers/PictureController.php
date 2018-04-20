<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Image;

class PictureController extends Controller
{
    public function getLike($id)
    {
        return Image::find($id)->getLike();

    }

    public function addLike($id)
    {
    	if(Auth::check()){
            $user = Auth::user();
            
            $poll = DB::table('likes')->where([
			    ['id_picture','=',$id],
			    ['id_user','=',$user->id],])->get();
        	
        	if(sizeof($poll) === 0){
        		DB::table('likes')->insert([
				    ['id_picture' => $id, 'id_user' => $user->id]
				]);
        	}
        	else {
        		return 'Deja like';
        	}
        }
        else {
        	return view('mustconnect');
        }
        
    }
}
