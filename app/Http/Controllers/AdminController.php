<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Clients;
use App\Orders;
use Auth;
use App\OrderDetails;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Auth::user()->role !== 'admin')
        {
            return redirect('/');
        }
        $orders = Orders::all();
        $order = [];
        
        for($i=0;$i<sizeof($orders);$i++)
        {
            $order[] = $orders[$i]->details()->get();
        }

        
        return view('admin/index', compact('order', 'orders'));
    }

    /**
     * Change status to order.
     *
     * @return \Illuminate\Http\Response
     */
    public function order($id)
    {
        if(Auth::user()->role !== 'admin')
        {
            return redirect('/');
        }
        $order = Orders::FindOrFail($id);
        $order->status = 'ordered';
        $order->save();
        return redirect('/admin');
    }

    /**
     * Change status to sent.
     *
     * @return \Illuminate\Http\Response
     */
    public function sent($id)
    {
        if(Auth::user()->role !== 'admin')
        {
            return redirect('/');
        }   
        $order = Orders::FindOrFail($id);
        $order->status = 'sent';
        $order->save();
        return redirect('/admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
