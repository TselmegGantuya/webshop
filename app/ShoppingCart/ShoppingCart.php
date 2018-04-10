<?php

namespace App\ShoppingCart;
use App\Myclasses\Shoppingitem;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart
{

    const SHOPPINGCART = 'Shoppingcart';
    private $items = [];
    private $session;

	function __construct($request)
	{
        $this->session = $request->session();
        $this->items = $this->session->has( 'SHOPPINGCART' ) ? $this->session->get( 'SHOPPINGCART' ) : [];

    }

    public function add($id)
    {
    	if(empty($this->items))
    	{
    		$item = new Shoppingitem($id,1);
			$this->session->push("SHOPPINGCART", $item);
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
        		$this->session->push("SHOPPINGCART",$item);
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
    	$cart = $this->session->get("SHOPPINGCART");
        for($i=0;$i<sizeof($cart);$i++)
        {
            if($cart[$i] == $item)
            {
                unset($cart[$i]);
            }
        }
        $this->session->set("SHOPPINGCART",$cart);
    	for($i=0;$i<sizeof($this->items);$i++)
        {
            if($this->items[$i] == $item)
            {
                unset($this->items[$i]);
            }
        }
    }

    public function removeAll()
    {
    	$this->session->forget("SHOPPINGCART");
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