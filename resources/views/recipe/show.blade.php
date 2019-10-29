@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="content-wrapper centering">

        <div class="show-recipe">
            <div class="recipe-img-container">
                <img class="recipe-img" src="{{ url($recipe->getPathToImage()) }}" alt="food-pic">
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


        <form action="{{ route('comments.store') }}" method="post" id="comment-form">
            @csrf
            <h2>Comment</h2>
            <input name="recipe_id" type="hidden" value="{{$recipe->id}}">
            <textarea name="comment" id="comment"></textarea>
            <input type="submit" class="btn btn-success" id="leave-comment" value="Leave a comment">
        </form>
        @endauth

        @if (!$comments->isEmpty())
            <div class="comments">
                @foreach($comments as $comment)
                    <div class="left-comment">
                        <h3>{{$comment->user->username}}</h3>
                        {{$comment->text}}
                        <small>{{$comment->created_at}} </small>
                    </div>
                @endforeach
            </div>
        @else
            <div class="comments" id="no-comments">
                <h1>(ಥ﹏ಥ) No comments. ¯\_(ツ)_/¯</h1>
            </div>
        @endif

    </div>
    <!-- /.container -->
@endsection

