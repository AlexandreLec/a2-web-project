<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\DB;

class EventCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category_event';

    public function events()
    {
        return $this->hasMany('App\Event', 'id_cat');
    }
}
