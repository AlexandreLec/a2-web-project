<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 

class NotificationController extends Controller
{
public function notif(){
    if(Auth::check()) {
        $user = Auth::user();
        $notif = Notification::all()->where('id_user', '=', $user->id);

        $notifs =  Notification::all();

        foreach ($notifs as $key => $notif) {
            $notif->recipients;
            $notif->author;
        }

        $arraynotif = array ();
        
        foreach ($notifs as $key => $notif) {
            $check = false;
            foreach  ($notif->recipients as $key => $recipient) {
                if($recipient->id == $user->id){
                    $check = true;
                }
            }
            if($check){
                array_push($arraynotif,$notif);
            }
        }

        return $arraynotif;

    }
}

public function deleteall(){
    
    if(Auth::check()) {
            $user = Auth::user();
          DB::table('is_for')->where('id_user', '=', $user->id)->delete();
           return 'ok';
        }
        return 'pas ok';

    }

}
          





