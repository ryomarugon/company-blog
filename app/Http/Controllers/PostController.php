<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderByDesc('created_at', 'desc')->paginate(6);
        $new_posts = Post::orderBy('id','desc')->take(5)->get();
        $tags = Tag::all();
        return view('posts.index', [
            'posts' => $posts,
            'tags' => $tags,
            'new_posts' => $new_posts
        ]);
    }
    public function create()
    {
        $new_posts = Post::orderBy('id','desc')->take(5)->get();
        return view('posts.create',['new_posts' => $new_posts]);
    }
    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = Auth::id();
        $post->fill($request->all())->save();
        $tag = new Tag(['post_id' => $post->id, 'name' => $request->tag]);
        $tag->save();
        return redirect()->route('posts.index');
    }
    public function show($id)
    {
        $post = Post::find($id);
        $new_posts = Post::orderBy('id','desc')->take(5)->get();
        return view('posts.show', [
            'post' => $post,
            'new_posts' => $new_posts
        ]);

    }
    public function edit($id)
    {
        $tags = Tag::all();
        $post = Post::find($id);
        $new_posts = Post::orderBy('id','desc')->take(5)->get();
        return view('posts.edit', [
            'tags' => $tags,
            'post' => $post,
            'new_posts' => $new_posts
        ]);
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->tags->name = $request->tag;
        $post->fill($request->all())->save();
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

}