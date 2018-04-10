@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Shopping Cart</div>

                <div class="card-body">
                    <ul>
                        @foreach($order as $details)
                            @foreach($details as $detail)
                                <li>
                                    <p>id: {{$detail->id}}</p>
                                    <p>order_id: {{$detail->order_id}}</p>
                                    <p>article_id: {{$detail->article_id}}</p>
                                    <p>description: {{$detail->description}}</p>
                                    <p>quantity: {{$detail->quantity}}</p>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection