<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $pic_cmt = new Comment;
            $pic_cmt->body = $request->content;
            $pic_cmt->id_user = $user->id;
            $pic_cmt->id_picture = $request->id_img;
            $pic_cmt->date_comment = date('Y-m-d');
            $pic_cmt->time_comment = date('G:i:s');
            
            $pic_cmt->save();
        }
        else {
            return 'vous devez etre connecté';
        }
    }

    public function removeComment($id){
        if(Auth::check()){
            $user = Auth::user();
            if($user->group->id === 4){
                Comment::find($id)->delete();
                return 'ok';
            }
        }
        else {
            return 'vous devez etre connecté et admin';
        }
    }
}

