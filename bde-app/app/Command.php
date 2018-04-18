<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'command';

    public function goodie()
    {
        return $this->belongsTo('App\Article', 'id_goodie');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
