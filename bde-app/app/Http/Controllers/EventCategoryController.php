<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventCategory;

class EventCategoryController extends Controller
{
    public function index(){
    	return EventCategory::all();
    }
}
