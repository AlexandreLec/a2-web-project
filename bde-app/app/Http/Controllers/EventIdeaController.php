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
            $eventIdea->price = $request->event_price;
            
            //uploaded img verification
            //check for img presence
            if ($request->hasFile('photo')) {
                if ($request->file('photo')->isValid()) {
                    
                    //validates file type
                    $this->validate($request, [
                        'image' => 'mimes:jpeg,bmp,png', //only allow this type extension file.
                    ]);
                    
                    $file = $request->file('photo');
                    $destinationPath = $request->file('photo')->store('users_upload');
                    $eventIdea->url_img = $destinationPath;
                }

            }
             
            //save to database
            $eventIdea->save();

            return view('isubmitconfirm');
            
        }else {
            return view('mustconnect');
        }
        
    }
    
}
