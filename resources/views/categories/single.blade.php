@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categorie {{$categorie->name}}</div>

                <div class="card-body">

                    <ul>
                        @foreach($articles as $art)
                        <li><a href="{{url('/article/get/' . $art->id) }}">{{$art->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
