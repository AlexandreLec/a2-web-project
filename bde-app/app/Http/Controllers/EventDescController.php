<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use App\Event;

class EventDescController extends Controller {
    
    public function create() {
        return view('event.evntdscp');
    }
    
    public function show($id){
        
        $eventid = Event::find($id);
        return view('event.evntdscp', compact('eventid'));
    }
        
    
    //saves the uploaded picture
    public function storepic(Request $request){
        if(Auth::check()){
            
            $event_pic = new Image;
            $event_pic->name = $request->file('photo')->getClientOriginalName();
            $event_pic->id_user = Auth::id();
            $event_pic->id_event = $request->event_id;
            $event_pic->url_picture = Image::upload($request, 'users_upload/event');
            $event_pic->save();
                    
            return $this->show($request->event_id);
        }  
        else {
            return 'vous devez etre connecté';
        }
    }
    
}