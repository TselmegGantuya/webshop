@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Articles</div>

                <div class="card-body">
                    <ul>
                        <form method='post' action='{{url("shop/order")}}'>
                        @csrf
                        @foreach($article as $art)
                            <li><a href="{{url('/article/get/' . $art->id) }}">{{$art->name}}</a> <span> price:{{$art->price}}</span><input type="input" name="{{$art->id}}" value='1'><a class="delete" id="{{$art->id}}" href="#">delete</a></li>
                        @endforeach
                        <input type="submit" name="" value='Order'>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
