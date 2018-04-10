<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
	use SoftDeletes;
	/**
     * The article that belong to the categories.
     */
    public function articles()
    {
        return $this->belongsToMany('App\Articles');
    }

    protected $table = 'categories';
}
