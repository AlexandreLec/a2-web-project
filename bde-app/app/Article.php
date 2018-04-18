<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
	protected $table = 'goodie'; 

	public function category()
    {
        return $this->belongsTo('App\ArticleCategory', 'id_category');
    }
}
