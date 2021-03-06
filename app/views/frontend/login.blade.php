@extends('master')
@section('content')
<h3>Login</h3>
<p>Bitte geben Sie Ihre Logindaten ein.</p>
{{ Form::open(array('route' => 'session.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
		{{ Form::label('email', 'E-Mail:', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'E-Mail Adresse')) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('password', 'Passwort:', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Passwort')) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Login', array('class' => 'btn btn-default')) }}
		</div>
	</div>
{{ Form::close() }}
@stop