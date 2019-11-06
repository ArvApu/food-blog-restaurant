@extends('layouts.app')

@section('title','Edit recipe')

@section('content')
    <div class="form-container">
        @include('errors')

            <h1>
                <strong>Edit recipe</strong>
            </h1>

            <form action="{{ route('recipes.update', $recipe->id) }} " method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <div class="form-entry">
                        <label for="name">Recipe name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $recipe->name }}">
                    </div>

                    <div class="form-entry">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description" >{{ $recipe->description }}</textarea>
                    </div>

                    <div class="form-entry">
                        <label for="products">Products</label>
                        <textarea type="text" class="form-control"  name="products" id="products" >{{ $recipe->products }}</textarea>
                    </div>

                    <div class="form-entry">
                        <label for="recipe">Recipe</label>
                        <textarea class="form-control" name="recipe" id="recipe">{{ $recipe->recipe }}</textarea>
                    </div>

                    <div class="form-entry">
                        <label for="picture">Recipe</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>

                    <div class="form-entry">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection
