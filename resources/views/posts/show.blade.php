@extends ('layouts.master')

@section('content')

<div class="col-sm-8 blog-main">

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">
        {{ $post->user->name }}
        {{ $post->postDate() ?? $post->updated_at }}
        </p>

        @if (count($post->tags))
            <ul>
                @foreach ($post->tags as $tag)
                    <li>
                        <a href="/blog/posts/tags/{{ $tag->name }}">
                            {{ $tag->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

        @endif

        {!! $post->body !!}
        
        <hr>

        <div class="comments">
            <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        {{ $comment->created_at->diffForHumans()}}: &nbsp;
                    </strong>
                    {{ $comment->body }}    
                </li>
            @endforeach

                
            </ul>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/blog/{{ $post->id }}/comments">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea id="body" name="body" class="form-control" placeholder="Your comment here" required></textarea>
                        </div>
                      
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>  
                        </div>
                      
                      @include('layouts.errors')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.blog-main -->
@endsection



