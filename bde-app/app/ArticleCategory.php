<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{

	protected $table = 'category'; 

    public function articles()
    {
        return $this->hasMany('App\Article', 'id_category');
    }
}
