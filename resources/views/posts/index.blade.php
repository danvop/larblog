@extends ('layouts.master')

@section('content')

<div class="col-sm-8 blog-main">

  @include('layouts.posts')

  <!-- Pagination Start -->
  <nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
  </nav>
  <!-- Pagination End -->

</div><!-- /.blog-main -->
@endsection
    