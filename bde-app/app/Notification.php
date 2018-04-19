<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    protected $table =  'notification';

    public function recipients()
    {
        return $this->belongsToMany('App\User', 'is_for', 'id_notif', 'id_user');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
