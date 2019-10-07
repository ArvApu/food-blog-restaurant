@extends('layouts.app')

@section('title','Add new recipe')

@section('content')

    <div class="container">

        @include('errors')

        <div class="card">

            <h5 class="card-header bg-card-header text-center py-4">
                <strong>Add new rental spot</strong>
            </h5>

            <form action="{{ route('recipes.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <div class="form-entry">
                        <label for="name">Recipe name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-entry">
                        <label for="tool_number">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="address">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-entry">
                        <label for="tool_number">Products</label>
                        <textarea class="form-control @error('products') is-invalid @enderror"  name="products" id="address">{{ old('products') }}</textarea>
                    </div>

                    <div class="form-entry">
                        <label for="tool_number">Recipe</label>
                        <textarea class="form-control @error('recipe') is-invalid @enderror" name="recipe" id="address">{{ old('recipe') }}</textarea>
                    </div>

                    <div class="form-entry">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
