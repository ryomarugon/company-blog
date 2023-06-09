@extends('layouts.app')
@section('content')
<h1 class="text-center">投稿編集</h1>
<div class="container">
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group"><input type="text" class="form-control" name="title" value="{{ $post->title }}">
        </div>
        <div class="form-group"><textarea name="body" class="form-control" id="" rows="10"
                placeholder="文章を入力">{{ $post->body }}</textarea></div>
        @foreach($post->tags as $tag)
        <div class="form-group"><input type="text" class="form-control" name="tag" value="{{ $tag->name }}">
        </div>
        @endforeach
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
</div>
</form>
</div>
@endsection