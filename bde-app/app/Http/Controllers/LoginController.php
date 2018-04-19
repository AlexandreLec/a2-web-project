<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;

class LoginController extends Controller
{

	//Pick fives random pictures for the home carousel
	public function randomPictures(){

		//Open pictures directory
		$dir = opendir("event/img");
		$tab = [];

		//Borwse event's pictures directory
		while(($file = readdir($dir)) !== false) {
			if($file !== "." && $file !== ".."){
				array_push($tab, $file);
			}
		}
		closedir($dir);

		//Pick fives random pictures
		if (count($tab) > 5){
			$pictures = [];
			$max = count($tab)-1;
			for ($i=0; $i<5; $i++){
				$index = random_int(0, $max);
				array_push($pictures, $tab[$index]);
				unset($tab[$index]);
				$tab = array_values($tab);
				$max--;
			}
			return $pictures;
		}
		else {
			return $tab;
		}
	}
	
    public function index(){
    	if(Auth::check()) {
    		$user = Auth::user();
    	}

    	$monthEvent = DB::table('event')->where('month_event', '1')->get();
    	$monthEvent = $monthEvent[0];

    	$pictures = $this->randomPictures();

    	return view('welcome', compact('user', 'monthEvent','pictures'));
    }

    public function login(Request $request){
    	$login = $request->input('login');
    	$pass = $request->input('password');
    	Auth::attempt(['mail' => $login, 'password' => $pass]);
    	return $this->index();
    }

    public function logout(){
    	Auth::logout();
    	return $this->index();
    }
}
