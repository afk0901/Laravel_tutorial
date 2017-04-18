@extends('layout')


@section('content')

<div class="container">

<div class="row">

<div class="col-sm-8 blog-main">

<h1>{{$post->title}}</h1>

@if (count($post->tags))

<ul>
@foreach($post->tags as $tags)

<li>

<a href="/posts/tags/{{$tags->name}}">{{$tags->name}}</a>

</li>


@endforeach

</ul>
@endif
<p>{{$post->body}}</p>


<div class="comments">

<ul class="list-group">
<!--Go to the post model, 
	find comments and loop through the result-->
@foreach ($post->comments as $comment)

<!--echo from the result of the $comment query the body column -->
<li class="list-group-item">

<strong>{{$comment->created_at->diffForHumans()}}&nbsp;</strong>

{{$comment->body}}

</li>


@endforeach

</ul>
</div>

{{--Add a comment here!--}}


<form method="POST" action="/comment/{{$post->id}}">

	{{csrf_field() }}

  <div class="form-group">

  	<ul class="list-group">

  	<li class="list-group-item">
  
    <textarea type="text" class="form-control" id="comment" placeholder="Add some comment..." name="comment">

    </textarea>

  </div>


  <button type="submit" class="btn btn-primary">Add Comment</button>
</form>

</li>

</ul>

@include('layouts.formvalerr')

</div>



@endsection


