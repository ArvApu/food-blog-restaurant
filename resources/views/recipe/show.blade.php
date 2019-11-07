@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="content-wrapper centering">

        <div class="show-recipe">
            <div class="recipe-img-container">
                <img class="recipe-img" src="{{ url($recipe->getPathToImage()) }}" alt="food-pic">
            </div>

            <div class="recipe-data">
                <div>
                    <h1>{{$recipe->name}}</h1>
                    <p class="recipe-box">{{$recipe->description}}</p>
                    <p class="recipe-box">{{$recipe->products}}</p>
                    <p class="recipe-box">{{$recipe->recipe}}</p>
                </div>
                <div class="recipe-box-meta">
                    <p> <b>Author: </b>{{$recipe->user->username}}</p>
                    <p style="font-style: oblique">{{$recipe->created_at}}</p>
                </div>
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
                        <h3>{{$comment->user->username}}
                            @auth @if(auth()->user()->ownerOfComment($comment->id))
                                <i class="fas fa-trash-alt comment-delete" onclick="document.getElementById('delete-{{$comment->id}}').submit();"></i>
                            @endif @endauth
                        </h3>
                        {{$comment->text}}
                        <small>{{$comment->created_at}} </small>
                    </div>
                    <form id="delete-{{$comment->id}}" action="{{ route('comments.destroy', $comment->id )}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
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

