<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Image;
use App\Event;
use ZipArchive;

class EventController extends Controller
{
    //take all the table Event on BDD
    public function index(){
    	$events = Event::all();

    	foreach ($events as $key => $event) {
    		$event->category;
            
    	}
    	return $events;
    }

    //add a new event with the formular
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

                $userIdeaId = $request->input('iduser');

            	return view('isubmitconfirm');
            }
        }else {
            return view('mustconnect');
        }
    }

    //Delete a user to event
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
    //Show Detail when you click on "more information"
    public function detail($id){
        $event = Event::find($id);
        return view('event.Detail', compact('event'));
    }

    //show Past Event
    public function past(){
        $events = Event::all()->where('statut', '=', 'DONE');
        return view('event.Past', compact('events'));
        }

        //unscribe to an event
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

    //unscribe to an event
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
    //show Json of participant
    public function participants($id){
    	$event = Event::find($id);
    	return $event->participants;
    }
    
    //show Json of event by id
    public function eventImgs($id){
        $event = Event::find($id);
        return $event->imgs;
    }
    
    

    //create and download zip
    public function downloadZip(){

    $files = glob(public_path('storage/users_upload/event/*'));

        \Zipper::make(public_path('photo.zip'))->add($files)->close();



        return response()->download(public_path('photo.zip'));
    }
}