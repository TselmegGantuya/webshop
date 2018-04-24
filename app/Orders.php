<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	use SoftDeletes;
    protected $fillable = ['client_id'];

    public function client()
    {
        return $this->belongsTo('App\Clients', 'id', 'client_id');
    }
    public function details()
    {
        return $this->hasMany('App\OrderDetails' , 'order_id', 'id');
    }
}
