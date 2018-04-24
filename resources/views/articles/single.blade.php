@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Article <b>{{$article->name}}</b></div>

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
                    <ul class="list-group">
                        <li class = "list-group-item active">Reviews</li>
                        @for($i=0;$i<sizeof($reviews);$i++)
                            <li class = "list-group-item">{{$reviews[$i]->review}}</li>
                        @endfor
                    </ul>
                    @if($review == true)
                    <form action ="{{url('/article/review/'. $article->id)}}" method="post">
                        @csrf
                        <h1>Leave a comment</h1>
                        <textarea name = "review"></textarea>
                        <input type="submit" value="Submit">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
