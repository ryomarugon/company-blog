@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>
            {{ $post->title }}
        </h1>
        <p>
            {{ $post->body }}
        </p>
    </div>
</div>
@endsection