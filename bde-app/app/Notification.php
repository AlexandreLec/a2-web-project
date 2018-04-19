<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class Notification extends Model
{
    protected $table =  'notification';

    public function addRecipient(User $user)
    {
    	DB::table('is_for')->insert(
		    ['id_notif' => $this->id, 'id_user' => $user->id]
		);
    }

    public function recipients()
    {
        return $this->belongsToMany('App\User', 'is_for', 'id_notif', 'id_user');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
