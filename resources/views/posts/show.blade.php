@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>
            <?php echo $post->title;?>
        </h1>
        <p>
            <?php echo $post->body;?>
        </p>
    </div>
</div>
@endsection