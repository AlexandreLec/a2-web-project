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
        }

        
        // $autor = Notification::all()->select('id', 'first_name')->join('notification','users_id','=','notification.id_user')->get() ;
        return $notifs;
    }
}

}

