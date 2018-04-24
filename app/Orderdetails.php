<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
	use SoftDeletes;
    protected $table = 'orderdetails';
    protected $fillable = ['order_id', 'article_id', 'quantity','description'];
}
