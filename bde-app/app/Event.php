<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event';

    public function truncatDesc() {

        $nb_words = 20;
        $tab = explode(' ', $this->description, $nb_words+1);
        unset($tab[$nb_words]);
        $this->descriptionShort = implode(' ', $tab).'...';

        return $this;
    }

    public function participantsCsv()
    {
        $participants = $this->participants;

        $participants = $this->participants->toArray();

        $fileName = "/public/event".$this->id.".csv";
        
        $exists = Storage::disk('public')->exists($fileName);

        if($this->statut !== 'DONE' || !$exists)
        {
            Storage::put($fileName,'prenom;nom;','public');
            foreach ($participants as $key => $participant) {
                $line = $participant['first_name'].';'.$participant['surname'].';';
                Storage::append($fileName,$line);
            }
        }
        return '/storage/event'.$this->id.'.csv';
    }

    public function isInParticipant(User $user)
    {
        $check = Event::find($this->id)->participants->where('id','=',$user->id);

        if (sizeof($check) === 0){
            return false;
        }
        else {
            return true;
        }
    }

    //Add a participants in participate table
    public function addParticipant(User $user)
    {
        DB::table('participate')->insert(
            ['id_user' => $user->id, 'id_event' => $this->id]
        );
    }

    public function category()
    {
        return $this->belongsTo('App\EventCategory', 'id_cat');
    }

    public function participants()
    {
        return $this->belongsToMany('App\User', 'participate', 'id_event', 'id_user');
    }
    
    public function nbrParticipants()
    {
        return count($this->participants);
    }
    
    public function imgs() {
        return $this->hasMany('App\Image', 'id_event');
    }
    
  
           
            
}
