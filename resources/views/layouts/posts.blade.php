@foreach ($posts as $post)
    <div class="blog-post">
        <h2 class="blog-post-title"><a href="/blog/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
        <p class="blog-post-meta">
        {{ $post->postDate() ?? $post->updated_at }}
        </p>
        {!! $post->postCuttedBody() !!}
        <a href="blog/posts/{{ $post->id }}#cut">Read more...</a>
        {{-- {!! $post->body !!} --}}
    </div>
  @endforeach