@extends ('layouts.master')

@section('content')

<div class="col-sm-8 blog-main">

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">
        {{ $post->postDate() ?? $post->updated_at }}
        </p>
        {!! $post->body !!}
    </div>
</div> <!-- /.blog-main -->
@endsection



