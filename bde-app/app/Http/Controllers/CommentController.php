<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Comment;
use App\Auth;

class CommentController extends Controller
{
    public static function addComment(Request $request){
        if(Auth::check()){
            $pic_cmt = new Comment;
            $pic_cmt->body = $request->cmt_content;
            $pic_cmt->id_user = Auth::id();
            $pic_cmt->id_picture = $request->pic_id;
            dd($request);
//            $pic_cmt->date_comment = $request->header->date;
//            $pic_cmt->time_comment = $request->header->time;
            
            $pic_cmt->save();
        }
        else {
            return 'vous devez etre connecté';
        }
    }
    
    public static function getComments($id_pic){
        $img = Image::find($id_pic);
        return $img->comments;
    }
}

