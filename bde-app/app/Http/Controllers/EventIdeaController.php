<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Input;
use App\User;
use App\EventIdea;
use App\Image;

class EventIdeaController extends Controller
{

    public function index(){
    	if(Auth::check()) {
    		$user = Auth::user();     
    	}

    	$ideas = EventIdea::all();

    	foreach ($ideas as $key => $idea) {
    		$idea = $idea->truncatDesc();
    	}

    	$ideas[0]->getPoll();

    	return view('event.ideas', compact('ideas', 'user'));
    }

    public function addPoll($id){
        if(Auth::check()) {
            $user = Auth::user();
            try {
                EventIdea::find($id)->addPoll($user->id,$id);
            } catch (\Exception $e) {
                return "Vote déjà pris en compte ";
            }
            return 'ok';   
        }
        return 'Utilisateur non authentifié';
    }

    public function getPoll($id){
        if(Auth::check()) {
            $user = Auth::user();
            try {
                $idea = EventIdea::find($id);
                return $idea->getPoll();
            } catch (\Exception $e) {
                return "Idea Event indisponible";
            } 
        }
        return 'Utilisateur non authentifié';
    }
    
    public function create() {
        return view('isubmit');
    }
    
    public function store(Request $request) {
        
        //Check if authentified
        if(Auth::check()){
            
            //model contaning the form data to input
            $eventIdea = new EventIdea;

            $eventIdea->id_user = Auth::id();
            $eventIdea->name = $request->event_name;
            $eventIdea->location = $request->event_place;
            $eventIdea->description = $request->event_desc;
            
            if($request->free == "on"){
                $eventIdea->price = 0;
            } 
            else {                
                $eventIdea->price = $request->event_price;
            }
                
            //uploaded img verification
            //check for img presence
            $eventIdea->url_img = Image::upload($request, 'users_upload/idea');
            
            //save to database
            $eventIdea->save();

            return view('isubmitconfirm');
            
        }else {
            return view('mustconnect');
        }
        
    }

    public function delete($id){
        if(Auth::check()) {
            $user = Auth::user();
            if($user->group->id === 4){
                EventIdea::find($id)->delete();
                return 'ok';
            }
        }
        return 'refused';
    }

    public function show($id){
        if(Auth::check()) {
            $user = Auth::user();
        }
        $idea = EventIdea::find($id);
        return view('event.idea', compact('idea','user'));
    }

    //API methods
    public function getAll(){

        $ideas = EventIdea::all();

        foreach ($ideas as $key => $idea) {
            $idea->getUser();
            $idea->getPoll();
            $idea = $idea->truncatDesc();
        }

        return $ideas;
    }
    
}
