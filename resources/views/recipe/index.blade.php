@extends('layouts.app')

@section('content')
<div class="content-wrapper">

    @foreach($recipes as $recipe)
      <div class="card">

        <img src="{{ url($recipe->getPathToImage()) }}" alt="food-pic" class='card-image'>

        <div class="card-container">
          <h4><b>{{ $recipe->name }}</b></h4>
          <p>{{ $recipe->user->username }}</p>
          <p>{{ $recipe->created_at }}</p>
          <p style="margin-top: 7px;" ><a class="r-l-box" href="{{ route('recipes.show', $recipe->id) }}">More</a>
              @auth @if(auth()->user()->ownerOfRecipe($recipe->id))
                  <i class="fas fa-trash-alt comment-delete"></i>
                  <a class='comment-link' href="{{ route('recipes.edit', $recipe->id) }}"> <i class="fas fa-edit comment-edit"></i></a>
              @endif @endauth
          </p>
        </div>

      </div>
    @endforeach
    <div class="paginator-container">
        {{ $recipes->links() }}
    </div>

  </div>
@endsection
