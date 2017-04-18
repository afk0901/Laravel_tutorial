@extends('layout')


<div class="container">

  

@section('content')

    

<div class="col-sm-8 blog-main">

<h1>Create some posts!</h1>



<form method="POST" action ="/posts">

{{csrf_field() }} {{--Must be with all forms for protection --}}

  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>

  <div class="form-group">
    <label for="body">Body:</label>

    <textarea type="text" class="form-control" id="body" name="body" class="form-control"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@include('layouts.formvalerr')
</div>
@endsection
</div>