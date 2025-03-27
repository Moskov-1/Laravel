<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("updated_at", "desc")->paginate(2);
        // return response()->json($posts, 200);
        return view("index", compact("posts"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedPost = $request->validate([
            "title"=> "required|unique:posts",
            "content"=> "required",
            "user_id"=> "required|exists:users,id",
        ]);
        Post::create($validatedPost);
        return response()->json(['post'=>$validatedPost]);
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        dd($post->toArray());
        return response()->json(['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
