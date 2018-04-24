@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Shopping Cart</div>

                <div class="card-body">
                    <ul>
                        @for($i=0;$i<sizeof($orders);$i++)
                        <h1>order status: {{$orders[$i]->status}}</h1>
                        <h1>order id: {{$orders[$i]->id}}</h1>
                        @if($orders[$i]->status == "ordered")
                            <a href="{{url('/admin/sent/' . $orders[$i]->id)}}">Change status to sent</a>
                        @else
                            <a href="{{url('/admin/order/' . $orders[$i]->id)}}">Change status to ordered</a>
                        @endif
                            @for($a=0;$a<sizeof($order[$i]);$a++)
                                <li>
                                    <p>id: {{$order[$i][$a]->id}}</p>
                                    <p>order_id: {{$order[$i][$a]->order_id}}</p>
                                    <p>article_id: {{$order[$i][$a]->article_id}}</p>
                                    <p>description: {{$order[$i][$a]->description}}</p>
                                    <p>quantity: {{$order[$i][$a]->quantity}}</p>
                                </li>
                            @endfor
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection