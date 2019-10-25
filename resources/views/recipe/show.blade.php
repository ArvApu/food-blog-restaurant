@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="content-wrapper centering">

        <div class="show-recipe">
            <div class="recipe-img">

            </div>

            <div class="recipe-data">
                <h1>{{$recipe->name}}</h1>
                <p>{{$recipe->description}}</p>
                <p>{{$recipe->products}}</p>
                <p>{{$recipe->recipe}}</p>
                <p>{{$recipe->user->username}}</p>
                <p>{{$recipe->created_at}}</p>
                <p></p>
            </div>

        </div>

        @auth
{{--            {{ route('comments.create', $recipe->id) }}--}}
        <form action="/" method="post" id="comment-form">
            @csrf
            @method('PUT')
            <h2>Comment</h2>
            <textarea name="comment" id="comment"></textarea>
            <input type="button" class="btn btn-success" id="leave-comment" value="Leave a comment">
        </form>
        @endauth

        <div class="comments">
            @foreach($comments as $comment)
                {{$comment->text}} <br>
                {{$comment->user_id}} <br>
                {{$comment->created_at}} <br>
            @endforeach
        </div>

    </div>
    <!-- /.container -->
@endsection

