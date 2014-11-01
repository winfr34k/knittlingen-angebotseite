<div id="myCompany">
	<h3>Passwort ändern:</h3>
	{{ Form::open(array('action' => array('UsersController@updatePassword', Auth::user()->id), 'method' => 'put')) }}
	  {{ Form::password('oldPassword', array('class' => 'form-control', 'placeholder' => 'Aktuelles Passwort')) }}
	  {{ Form::password('newPassword', array('class' => 'form-control', 'placeholder' => 'Neues Passwort')) }}
	  {{ Form::password('newPasswordRpt', array('class' => 'form-control', 'placeholder' => 'Neues Passwort (wdh.)')) }}
	  {{ Form::submit('Passwort ändern', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}

	<h3>E-Mail Adresse ändern:</h3>
	<p><b>Aktuelle E-Mail Adresse:</b> {{ Auth::user()->email }}</p>
	{{ Form::open(array('action' => array('UsersController@updateEmail', Auth::user()->id), 'method' => 'put')) }}
	  {{ Form::email('newEmail', '', array('class' => 'form-control', 'placeholder' => 'Neue E-Mail Adresse')) }}
	  {{ Form::email('newEmailRpt', '', array('class' => 'form-control', 'placeholder' => 'Neue E-Mail Adresse (wdh.)')) }}
	  {{ Form::submit('E-Mail Adresse ändern', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
</div>