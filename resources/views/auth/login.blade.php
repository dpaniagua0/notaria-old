@extends('login')

@section('content')

<div>
	<div>

		<h1 class="logo-name">N+</h1>

	</div>
	<h3>Bienvenido a N+</h3>

	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form class="form-horizontal" role="form" method="POST" action="/auth/login">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<input type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}">
		</div>

		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="Contraseña">
		</div>

		<button type="submit" class="btn btn-primary block full-width m-b">Login</button>

		<!--<a href="#"><small>Forgot password?</small></a>
		<p class="text-muted text-center"><small>Do not have an account?</small></p>
		<a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>-->
	</form>

</div>

@endsection
