<?php

namespace App\Http\Controllers;

use App\Recipe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

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
            'picture' => ['sometimes','max:10000', 'image']
        ]);

        $recipe = Recipe::create($attributes + ['user_id' => Auth::id()]);
        $recipe->addImage($request);

        return redirect('/recipes');
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
            'comments' => $recipe->comments()->with('user')->get(),
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
        $recipe->addImage($request);

        return redirect('/recipes');
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
        if(auth()->user()->ownerOfRecipe($recipe->id))
            $recipe->delete();
        return redirect('/recipes');
    }
}
