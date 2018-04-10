@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Shopping Cart</div>

                <div class="card-body">
                    <ul>
                        <form action='{{url("shop/order")}}'  method='post'>
                        @csrf
                        @for($i=0;$i<sizeof($article);$i++)
                            <li>
                                <a href="{{url('/article/get/' . $article[$i]->id) }}">{{$article[$i]->name}}</a> 
                                <span> price:{{$article[$i]->price}}</span>
                                <input type="input" name="{{$article[$i]->id}}" value='{{$items[$i]->quantity}}'>  
                                <a class="delete" id="{{$article[$i]->id}}" href="#">delete</a>
                            </li>
                        @endfor
                        @if(!empty($article))
                        <input type="submit" name="" value='Order'>
                        @endif
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
