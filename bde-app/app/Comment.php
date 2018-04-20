<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comment';

    public function img()
    {
        return $this->belongsTo('App\Image', 'id_picture');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

}



