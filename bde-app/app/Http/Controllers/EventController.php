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

    public function event(){
        if(Auth::check()) {
            $user = Auth::user();
        }
        $events = Event::all()->where('statut', '!=', 'DONE');
        foreach ($events as $key => $event) {
            $event = $event->truncatDesc();
        }
        return view('event.Event', compact('events','user'));
    }

    public function detail($id){
        $event = Event::find($id);
        return view('event.Detail', compact('event'));
    }


    public function past(){
        $events = Event::all()->where('statut', '=', 'DONE');
        return view('event.Past', compact('events'));
        }

    public function subscribe($id){
        if(Auth::check()) {
            $user = Auth::user();
            $event = Event::find($id);

            if(!$event->isInParticipant($user)){
                $event->addParticipant($user);
                return 'added';
            }
            else {
                return 'Deja inscrit';
            }
        }
        return 'refused';
    }

    public function unscribe($id){
        if(Auth::check()) {
            $user = Auth::user();
            $event = Event::find($id);

            if($event->isInParticipant($user)){
                $event->removeParticipant($user);
                return 'removed';
            }
            else {
                return 'Pas encore inscrit';
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
    
    public function eventImgs($id){
        $event = Event::find($id);
        return $event->imgs;
    }

}

    //public function downloadZip($id){
      //  $event = Event::find($id);
        //$tab = $event->imgs;
        //return $tab;
    //}

       // Zipper::make(public_path('test.zip'))->add($file)->close();
        //return $file;

        //return response()->download(public_path('Photo.zip'));



