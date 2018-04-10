<?php

namespace App\ShoppingCart;
use App\ShoppingCart\Shoppingitem;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart
{

    const SHOPPINGCART = 'Shoppingcart';
    private $items = [];
    private $session;

	function __construct($request)
	{
        $this->session = $request->session();
        $this->items = $this->session->has( self::SHOPPINGCART ) ? $this->session->get( self::SHOPPINGCART ) : [];

    }

    public function add($id)
    {
    	if(empty($this->items))
    	{
    		$item = new Shoppingitem($id,1);
			$this->session->push(self::SHOPPINGCART, $item);
			$this->items[] = $item;
    	}else
    	{
            
    		if($this->getItem($id))
    		{
    			$item = $this->getItem($id);
    			$item->quantity += 1;
    		}
            else
            {
        		$item = new Shoppingitem($id,1);
        		$this->session->push(self::SHOPPINGCART,$item);
        		$this->items[] = $item;
            }
    	}   
    	

    }

    public function getAll()
    {
    	if(!$this->isEmpty()){
    		return $this->items;
    	}
    }

    public function remove($id)
    {
		$item = $this->getItem($id);
    	$cart = $this->session->get(self::SHOPPINGCART);
        for($i=0;$i<sizeof($cart);$i++)
        {
            if($cart[$i] == $item)
            {
                unset($cart[$i]);
            }
        }
        $this->session->put(self::SHOPPINGCART,$cart);
    	for($i=0;$i<sizeof($this->items);$i++)
        {
            if($this->items[$i] == $item)
            {
                unset($this->items[$i]);
            }
        }
        dd($cart);
    }

    public function removeAll()
    {
    	$this->session->forget(self::SHOPPINGCART);
    }


    public function isEmpty()
    {
    if(empty($this->items))
    	{
    		//empty
    		return false;
    	}
    }

    /**
    *	@param $id Id of shopping item
    *	@return A shopping item
    */
    public function getItem($id)
    {
    	for($i=0;$i<sizeof($this->items);$i++)
		{
			if($this->items[$i]->name == $id)
			{
				return $this->items[$i];
			}
		}
        return false;
    }
}