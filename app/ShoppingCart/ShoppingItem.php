<?php

namespace App\Myclasses;

class ShoppingItem
{
	public $name;
	public $quantity;
	function __construct($id, $numb)
	{
		$this->name = $id;
		$this->quantity = $numb;
	}
}