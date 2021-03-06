<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use SoftDeletes;
	protected $fillable = [
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function orders()
    {
        return $this->hasMany('App\Orders', 'client_id','id');
    }
}
