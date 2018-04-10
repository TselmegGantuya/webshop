<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
	use SoftDeletes;
	/**
     * The categories that belong to the article.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Categories');
    }
    protected $table = 'articles';
}
