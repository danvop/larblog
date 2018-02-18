@extends ('layouts.master')

@section('content')

<div class="col-sm-8 blog-main">
<h2>Create a Post</h2>
<hr>
<form method="POST" action="/blog/posts">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>

  <div class="form-group">
    <label for="body">Body</label>
    <textarea id="body" name="body" class="form-control"></textarea>
  </div>
  
  <div class="form-group">
  <button type="submit" class="btn btn-primary">Submit</button>  
  </div>
  
  @include('layouts.errors')

</form>




</div>

@endsection