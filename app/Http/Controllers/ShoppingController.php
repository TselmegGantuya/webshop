<?php

namespace App\Http\Controllers;
use App\ShoppingCart\Shoppingcart;
use App\Articles;
use App\Clients;
use App\Orders;
use Auth;
use App\OrderDetails;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{   
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart = new Shoppingcart($request);
        $items = $cart->getAll();
        $article= [];
        for($i=0;$i<sizeof($items);$i++)
        {
            $article[] = Articles::FindOrFail($items[$i]->name);
        }

        return view('shopping/index',compact('items','article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $cart = new Shoppingcart($request);
        $cart->add($request->input('id')); 
    }

    /**
     * Store a newly created order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $items = $request->all();
        unset($items['_token']);
        $client = Auth::user()->client()->first();
        $order = Orders::create([
            'client_id' => $client->id,
        ]);
        foreach($items as $key => $value)
        {
            OrderDetails::create([
                'order_id' => $order->id,
                'article_id' => $key,
                'quantity' => $value,
                'description' => 'hey',
            ]);
        }

        $cart = new Shoppingcart($request);
        $cart->removeAll(); 

        return redirect()->to('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $cart = new Shoppingcart($request);
        $cart->remove($request->input('id')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request, $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        if(Auth::user()->role == 'admin')
        {

        }
        $orders = Auth::user()->client()->first()->orders()->get();
        $order = [];
        for($i=0;$i<sizeof($orders);$i++)
        {
            $order[] = $orders[$i]->details()->get();
        }
        
        return view('shopping/all', compact('order'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
