<div class="blog-masthead">
  <div class="container">
    <nav class="nav">
      <a class="nav-link active" href="#">Home</a>
      <a class="nav-link" href="#">New features</a>
      <a class="nav-link" href="#">Press</a>
      <a class="nav-link" href="/blog">Blog</a>
      @if(auth()->check())
        <a class="nav-link ml-auto" href="#">{{ auth()->user()->name }}</a>  
      @endif
      
    </nav>
  </div>
</div>