@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Article {{$article->name}}</div>

                <div class="card-body">

                    <ul>
                        <li>name:{{$article->name}}</li>
                        <li>price:{{$article->price}}</li>
                        @foreach($article->categories as $cat)
                        <li>categories:<a href="{{url('/categorie/get/' . $cat->id) }}">{{$cat->name}}</a></li>
                        @endforeach
                        @guest
                        @else
                        <li class='add' id="{{$article->id}}"><a href="#add">add to shopping cart</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
