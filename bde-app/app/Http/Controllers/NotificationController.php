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
   $notif = Notification::all();
   return $notif;
}
}
}