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

    	return view('event.ideas', compact('ideas', 'user'));
    }
}
