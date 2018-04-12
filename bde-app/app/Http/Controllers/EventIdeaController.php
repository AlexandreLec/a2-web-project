<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        
        $eventIdea = new EventIdea;
        
        $eventIdea->name = $request->event_name;
        $eventIdea->location = $request->event_place;
        $eventIdea->description = $request->event_desc;
        //$eventIdea->url_img = $request->event_name;
        $eventIdea->price = $request->event_price;
        $eventIdea->id_user = 5;
        
        $eventIdea->save();
                
        return view('isubmitconfirm');
    }
    
}
