<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Recipe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('recipe.index', [
            'recipes' => Recipe::with('user')->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'products' => ['required', 'string'],
            'recipe' => ['required', 'string'],
        ]);
        Recipe::create($attributes + ['user_id' => Auth::id()]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param Recipe $recipe
     * @return void
     */
    public function show(Recipe $recipe)
    {

        return view('recipe.show', [
            'recipe' => $recipe,
            'comments' => $recipe->comments()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Recipe $recipe
     * @return void
     */
    public function edit(Recipe $recipe)
    {
        return view('recipe.edit', [
            'recipe' => $recipe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Recipe $recipe
     * @return Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'products' => ['required', 'string'],
            'recipe' => ['required', 'string'],
        ]);
        $recipe->update($attributes);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Recipe $recipe
     * @return Response
     * @throws Exception
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect('/');
    }
}
