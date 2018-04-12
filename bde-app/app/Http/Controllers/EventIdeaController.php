<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}