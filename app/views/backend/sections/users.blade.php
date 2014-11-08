<div id="users">
	@if(count(Input::old()) > 0 && Input::old('id') && Input::old('type') == 'user')
	<h3>Benutzer bearbeiten: {{ Input::old('name')  }}</h3>
	{{ Form::open(array('route' => array('users.update', Input::old('id')), 'method' => 'put')) }}
	@else
	<h3>Neuen Benutzer anlegen:</h3>
	{{ Form::open(array('route' => 'users.store')) }}
	@endif
	  {{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'E-Mail Adresse')) }}
	  {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Passwort'))}}
	  {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Firmenname')) }}
	  {{ Form::text('website', '', array('class' => 'form-control', 'placeholder' => 'Webseite')) }}
	  <div class="checkbox"><label>{{ Form::checkbox('is_admin', true) }} Administrator</label></div>
	  {{ Form::submit('Speichern', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}

	<h3>Vorhandene Benutzer:</h3>
	<table class="table table-striped">
	    <tr>
	      <th>ID</th>
	      <th>Firma</th>
	      <th>E-Mail Adresse</th>
	      <th>Webseite</th>
	      <th># Angebote</th>
	      <th class="edit">Bearbeiten</th>
	    </tr>
	    @if(count(User::all()) > 0)
	      @foreach(User::all() as $user)
	      <tr>
	        <td>{{ $user->id }}</td>
	        <td>{{ $user->company->name }}</td>
	        <td>{{ $user->email }}</td>
	        <td>{{ link_to($user->company->website) }}</td>
	        <td>{{ count($user->offers) }}</td>
	        <td class="edit">
	          {{ Form::open(array('route' => array('users.edit', $user->id), 'method' => 'get')) }}
	            {{ Form::button('<span class="glyphicon glyphicon-edit"></span>', array('type' => 'submit', 'class' => 'btn btn-info')) }}
	          {{ Form::close() }}
	          @if($user->id != 1 && $user->id != Auth::id())
	            {{ Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'delete')) }}
	              {{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('type' => 'submit', 'class' => 'btn btn-danger')) }}
	            {{ Form::close() }}
	          @endif
	        </td>
	      </tr>
	      @endforeach
	    @else
	     <tr>
	      <td colspan="6"><center><i>-- Es sind keine Nutzer vorhanden --</i></center></td>x
	    </tr>
	    @endif
	</table>
</div>