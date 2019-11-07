<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'comment' => ['required','string','max:200'],
            'recipe_id' => ['required','numeric'],
        ]);

        Comment::create([
            'text' => $data['comment'],
            'user_id' => Auth::id(),
            'recipe_id' => $data['recipe_id'],
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        if(auth()->user()->ownerOfComment($comment->d))
            $comment->delete();
        return redirect()->back();
    }
}
