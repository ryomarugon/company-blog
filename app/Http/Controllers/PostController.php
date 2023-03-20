<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('created_at','desc')->paginate(6);        
        // $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts
        ]);
        
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->save();
        return redirect()->route('posts.index');
    }
    public function show($id){
        $post= Post::find($id);
        return view('posts.show', [
            'post' => $post
        ]);
        
    }
    public function edit($id){
        $post= Post::find($id);
        return view('posts.edit', [
            'post' => $post
        ]);
    }



    
    public function update(Request $request,$id){
        $post= Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('posts.index');
    }
    
    public function destroy($id){
        $post= Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
    
}