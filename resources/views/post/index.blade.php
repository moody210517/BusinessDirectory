@extends('user.main')

@section('content')
<div class="container" style = "margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a>
                    </div>

                    <div class="card-body">
                        {{ $post->content }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection