<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Group;
use App\EventCategory;

class UserController extends Controller
{

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

    public function register(){
        return view('register');
    }

	//add a new user on BDD
    public function store(Request $request){
        $firstName = $request->input('Name');
        $surname = $request->input('Surname');
        $mail = $request->input('Mail');
        $password = $request->input('Password');
        $name = $request->input('Grade');
        $password = Hash::make($password);
        $add = DB::select("CALL ajout_user(?,?,?,?,?)",array($firstName, $surname, $mail, $password,$name));
        return view('RegisterConfirm');
    }


    public function admin(){
    	if(Auth::check()) {
    		$user = Auth::user();
    		if($user->group->id === 4){
                $categories = EventCategory::all();
    			return view('admin.index', compact('user', 'categories'));
    		}
    	}
    	return $this->index();
    }

	//Add a new BDE Member
    public function update($id, Request $request){
    	if(Auth::check()) {
    		$user = Auth::user();
    		
            if($user->group->id === 4){
                $userUpdate = User::find($id);
            $userUpdate->change($request->input('firstname'),$request->input('surname'),$request->input('mail'), $request->input('grade'));
            }
    		return $this->admin();
    	}
    }

	//Delete a BDE Member
    public function delete($id){
        if(Auth::check()) {
            $user = Auth::user();
            if($user->group->id === 4){
                User::find($id)->delete();
                return 'ok';
            }
        }
        return 'refused';
    }

    //API methods
    public function list(){
    	if(Auth::check()) {
    		$user = Auth::user();
    	}

    	$users = User::all();

    	foreach ($users as $key => $user) {
    		$user->getGroup();
            $user->events;
    	}

    	return $users;
    }

    public function get($id){
    	if(Auth::check()) {
    		$user = Auth::user();
    	}
    	return User::find($id);
    }


}
