<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Image extends Model
{
    public static function upload(Request $request, $folder ){

    	if ($request->hasFile('photo')) {
                if ($request->file('photo')->isValid()) {
                    
                    //validates file type
//                    $request->validate($request, [
//                        'image' => 'mimes:jpeg,bmp,png', //only allow this type extension file.
//                    ]);
//                    dd($request);
                    
                    $file = $request->file('photo');
                    $destinationPath = $request->file('photo')->store($folder, 'public');
                 
                    return '/storage/'.$destinationPath;
                }
            }
            return "Une erreur s'est produite";

    }
}
