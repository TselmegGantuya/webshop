<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'orderdetails';
    protected $fillable = ['order_id', 'article_id', 'quantity','description'];
}
