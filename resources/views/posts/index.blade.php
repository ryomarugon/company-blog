@extends('layouts.app')
@section('content')
<h1 class="text-center pt-5">投稿一覧</h1>
<div class="container">
    <div class="row">
        <?php foreach($posts as $post): ?>
        <div class="col-4">
            <div class="card mt-5">
                <img class="card-img"
                    src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/pasta.jpg"
                    alt="Bologna">
                <!-- <div class="card-img-overlay">
                    <a href="#" class="btn btn-light btn-sm">Cooking</a>
                </div> -->
                <div class="card-body">
                    <h4 class="card-title"><?php echo $post->title;?></h4>
                    <!-- <small class="text-muted cat">
                        <i class="far fa-clock text-info"></i> 30 minutes
                        <i class="fas fa-users text-info"></i> 4 portions
                    </small> -->
                    <p class="card-text"><?php echo $post->body;?></p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">続きを読む</a>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                    <div class="views"><?php echo $post->created_at;?>
                    </div>
                    @if($post->user_id===Auth::id())
                    <div class="author_only d-flex">
                        <a href="{{route('posts.edit', $post->id)}}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{route('posts.destroy', $post->id)}}" method='post'>
                            @csrf
                            @method("DELETE")
                            <button type="submit" style="border:none;background:none">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                    @else
                    <div>Posted by <?php echo $post->user->name;?></div>
                    @endif
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<div class="d-flex justify-content-center mt-5">
    {{ $posts->links() }}
</div>
@endsection