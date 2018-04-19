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
        return $notif;
    }
}
}