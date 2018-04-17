<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Image;
use App\Event;

class EventController extends Controller
{
    public function index(){
    	$events = Event::all();

    	foreach ($events as $key => $event) {
    		$event->category;
    	}
    	return $events;
    }

    public function insert(Request $request){
    	if(Auth::check()){
            
            $user = Auth::user();
    		
            if($user->group->id === 4){
                $event = new Event();
    			$event->name = $request->input('name');
    			$event->description = $request->input('desc');
    			$event->location = $request->input('location');
    			$event->event_date = $request->input('date');
    			$event->event_time = $request->input('hour');
    			$event->price = $request->input('price');
    			$event->recurrence = $request->input('recurence');

    			$event->id_cat=2;

    			$event->url_img = Image::upload($request,'users_upload/event');

    			$event->save();
            	return view('isubmitconfirm');

            }
            
            
        }else {
            return view('mustconnect');
        }
    }

    public function delete($id){
        if(Auth::check()) {
            $user = Auth::user();
            if($user->group->id === 4){
                Event::find($id)->delete();
                return 'ok';
            }
        }
        return 'refused';
    }

    //API methods
    public function participantsCsv($id){
    	$event = Event::find($id);
    	return redirect($event->participantsCsv());
    }

    public function participants($id){
    	$event = Event::find($id);
    	return $event->participants;
    }

    public function event(){
        $events = Event::all();

     return view('Event', compact('events'));
}
}