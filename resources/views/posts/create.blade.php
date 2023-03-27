@extends('layouts.app')
@section('content')
<h1 class="text-center">新規投稿</h1>
<div class="container">
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group"><input type="text" class="form-control" name="title" placeholder="タイトルを入力" required>
        </div>
        <div class="form-group"><textarea name="body" class="form-control" id="" rows="10" placeholder="文章を入力"
                required></textarea></div>
<<<<<<< Updated upstream
        <div class="form-group"><input type="text" class="form-control" name="title" placeholder="＃タグを入力（ , 区切り）" required></div>
=======
        <div class="form-group"><input type="text" class="form-control" name="tag" placeholder="＃タグを入力（ , 区切り）"></div>
>>>>>>> Stashed changes
        <!-- jsでの実装が必要 -->
        <div class="form-group text-center"><button type="submit" class="btn btn-primary">Submit</button></div>
</div>
</form>
</div>
@endsection