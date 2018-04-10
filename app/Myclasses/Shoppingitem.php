<?php

namespace App\Myclasses;

class Shoppingitem
{
	public $name;
	public $quantity;
	function __construct($id, $numb)
	{
		$this->name = $id;
		$this->quantity = $numb;
	}
}