@extends ('layout');

@section ('content')

<div class="col-sm-8">

<h1>Register</h1>

<form method="POST" action="/register">

	{{csrf_field()}}

<div class="form-group">

<label for="name">Name:</label>

<input type="text" class="form-control" id ="name" name="name">

</div>

<div class="form-group">

<label for="email">email:</label>

<input type="text" class="form-control" id ="email" name="email">

</div>

<div class="form-group">

<label for="password">Password:</label>

<input type="password" class="form-control" id ="password" name="password">

</div>


<div class="form-group">

<label for="password_confirmation">Confirm Password:</label>

<input type="password" class="form-control" id ="password_confirmation" name="password_confirmation">

</div>

<div class="form-group">


<button type="submit" class="btn btn-primary">Register</button>

</div>



</form>
@include('layouts.formvalerr')
</div>

@endsection