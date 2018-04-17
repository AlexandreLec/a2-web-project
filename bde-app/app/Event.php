<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event';

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

    public function category()
    {
        return $this->belongsTo('App\EventCategory', 'id_cat');
    }

    public function participants()
    {
        return $this->belongsToMany('App\User', 'participate', 'id_event', 'id_user');
    }
}
