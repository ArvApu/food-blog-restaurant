@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="content-wrapper centering">

        <div class="show-recipe">
            <div class="recipe-img">

            </div>

            <div class="recipe-data">
                <h1>  {{$recipe->name}} </h1>
                <p>{{$recipe->description}}</p>
                <p>{{$recipe->products}}</p>
                <p>{{$recipe->recipe}}</p>
                <p>{{$recipe->user->username}}</p>
                <p>{{$recipe->created_at}}</p>
                <p></p>
            </div>

        </div>

    </div>
    <!-- /.container -->
@endsection

