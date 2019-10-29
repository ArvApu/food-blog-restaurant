@extends('layouts.app')

@section('title','Add new recipe')

@section('content')

    <div class="container">

        @include('errors')

        <div class="card">

            <h5 class="card-header bg-card-header text-center py-4">
                <strong>Add new rental spot</strong>
            </h5>

            <form action="{{ route('recipes.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <div class="form-entry">
                        <label for="name">Recipe name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-entry">
                        <label for="description">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value=""{{ old('description') }}>
                    </div>

                    <div class="form-entry">
                        <label for="products">Products</label>
                        <input type="text" class="form-control @error('products') is-invalid @enderror"  name="products" id="products" value=""{{ old('products') }}>
                    </div>

                    <div class="form-entry">
                        <label for="recipe">Recipe</label>
                        <textarea class="form-control @error('recipe') is-invalid @enderror" name="recipe" id="recipe">{{ old('recipe') }}</textarea>
                    </div>

                    <div class="form-entry">
                        <label for="picture">Recipe</label>
                        <input type="file" class="form-control @error('recipe') is-invalid @enderror" name="picture" id="picture" value=""{{ old('recipe') }}>
                    </div>

                    <div class="form-entry">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
