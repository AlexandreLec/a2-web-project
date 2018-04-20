<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\isFor;

class NotificationController extends Controller
{
    //check the user,take the table notification where id = id of user connected
public function notif(){
    if(Auth::check()) {
        $user = Auth::user();
        $notif = Notification::all()->where('id_user', '=', $user->id);

        $notifs =  Notification::all();

        foreach ($notifs as $key => $notif) { //Browse the array
            $notif->recipients;
            $notif->author;
        }

        $arraynotif = array (); //new array 
        
        foreach ($notifs as $key => $notif) { // Browse the array
            $check = false;
            foreach  ($notif->recipients as $key => $recipient) {
                if($recipient->id == $user->id){ // check if the user is the goog recipient
                    $check = true;
                }
            }
            //send JSON
            if($check){
                array_push($arraynotif,$notif);
            }
        }

        return $arraynotif;

    }
}

public function addNotif(Request $request) {
    if(Auth::check()){
        $notifs =  Notification::all();
        
        $notif = new Notification;
        $notif->name = $request->type.' non conforme';
        $notif->description = $request->info.' ---- dans '.$request->event_name.'  '.$request->pic_name;
        $notif->notif_date = date("Y-m-d");
        $notif->id_user = Auth::id();
        
        
        $notif->save();
        
        $corres = new isFor;
        $corres->id_notif = count($notifs)+1;
        $corres->id_user = 1;
        
        $corres->save();
        
        return view('reported');
    }
    else {
        return 'connectez vous';
    }
}

//delet all notif of the table is_for in the database where id_user in the user connected
public function deleteall(){
    
    
    if(Auth::check()) {
            $user = Auth::user();
          DB::table('is_for')->where('id_user', '=', $user->id)->delete();
           return 'ok';
        }
        return 'pas ok';

    }

}
          





