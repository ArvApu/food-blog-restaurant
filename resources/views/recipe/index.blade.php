@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($recipes as $recipe)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>{{ $recipe->name }}</div>
            </li>
        @endforeach
    </div>
@endsection
