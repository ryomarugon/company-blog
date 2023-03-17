@extends('layouts.app')
@section('content')
<h1 class="text-center">投稿内容確認</h1>
<div class="container">
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <?php echo $_POST["title"];?>
        <?php echo $_POST["body"];?>
        <input type="hidden" name="title" value="<?php echo $_POST["title"];?>">
        <input type="hidden" name="body"><?php echo $_POST["body"]; ?></input>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</div>

</div>
@endsection