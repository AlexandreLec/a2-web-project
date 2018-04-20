<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Image extends Model
{
    protected $table = 'picture';
    
    public static function upload(Request $request, $folder ){

    	if ($request->hasFile('photo')) {
                if ($request->file('photo')->isValid()) {
                    
                    //validates file type
//                    $request->validate($request, [
//                        'image' => 'mimes:jpeg,bmp,png', //only allow this type extension file.
//                    ]);
//                    dd($request);
                    
                    $file = $request->file('photo');
                    $destinationPath = $file->store($folder, 'public');
                 
                    return '/storage/'.$destinationPath;
                }
            }
            return "Une erreur s'est produite";

    }
    
    public $timestamps = false;

    public function getLike() {

        if($this->likes == null){
            $poll = DB::table('likes')->where('id_picture','=',$this->id)->get();
            $poll = sizeof($poll);
            return $this->likes = $poll;
        }
        else {
            return $this->likes;
        }
        
    }
    
    public function event()
    {
        return $this->belongsTo('App\Event', 'id_event');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'id_picture');
    }
}
