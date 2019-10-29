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
          <p><a href="{{ route('recipes.show', $recipe->id) }}">More</a></p>
        </div>

      </div>
    @endforeach
    <div class="paginator-container">
        {{ $recipes->links() }}
    </div>

  </div>
@endsection
