<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class EventIdea extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event_idea';

    public function truncatDesc() {

    	$nb_words = 10;
    	$tab = explode(' ', $this->description, $nb_words+1);
    	unset($tab[$nb_words]);
    	$this->descriptionShort = implode(' ', $tab).'...';

    	return $this;
    }

    public function getPoll() {
    	if($this->poll == null){
    		$res = DB::select('CALL recup_poll(?)', array($this->id));
    		return $this->poll = $res[0]->poll;
    	}
    	else {
    		return $this->poll;
    	}

    }

    public function addPoll($idUser, $idIdea) {
        
        DB::table('poll')->insert([
            'id_user' => $idUser,
            'id_idea' => $idIdea]);
    }

    public function getUser(){
            return $this->user;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public $timestamps = false;
}
