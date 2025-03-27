<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Blog;
class BlogController extends Controller
{
    public function all(){
        $blogs = Blog::all();
        return view("blogs", compact("blogs"));
    }
    public function get($id){
        $blog = Blog::find($id);
        $is_author = (auth()->check() && $blog->isAuthor(auth()->user()->id)) ? true : false;
        return view("read_blog", compact("blog", "is_author"));
    }
    public function write(){
        return view("writeBlog");
    }
    public function store(Request $request){
        //dd($request->all());
        $validatedData = $request->validate([
            "title"=> ["required", Rule::unique("blogs","title")],
            "description"=> "required",
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        Blog::create($validatedData);
        return view("writeBlog")->with("success","blog publish successful");
    }
    public function edit($id){
        $blog = Blog::find($id);
        if($blog->user->id != auth()->user()->id){
            return redirect('/')->with('error', 'Not user\'s blog');
        }
        return view('blog-edit', compact('blog'));
    }
    public function update(Request $request, $id){
        $blog = Blog::find($id);
        $validatedData = $request->validate([
            'title'=> ['required', Rule::unique('blogs','title')],
            'description' => "required",
        ]);
        $blog->update($validatedData);
        return redirect()->route("blog.get", [$id])->with("success","Blog updated");
    }

    public function delete($id){
        $blog = Blog::find($id);
        if(auth()->check() && $blog->user->id != auth()->user()->id){
            return redirect("/")->with("error","Not user's blog");
        }
        $blog->delete();
        return redirect()->route("blog.all")->with("success", "blog deleted");
    }
}
