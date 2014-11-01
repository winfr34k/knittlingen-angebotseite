<div id="settings">
	@if(count(Input::old()) > 0 && Input::old('id') && Input::old('type') == 'setting')
	<h3>Systemeinstellung ändern:</h3>
	{{ Form::open(array('route' => array('settings.update', Input::old('id')), 'method' => 'put')) }}
	@else
	<h3>Systemeinstellungen:</h3>
	{{ Form::open(array('route' => 'settings.store')) }}
	@endif
	  @if(count(Input::old()) > 0 && Input::old('id') && Input::old('type') == 'setting')
	  {{ Form::label('name', Input::old('name'), array('class' => 'form-control')) }}
	  @else
	  {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Einstellung')) }}
	  @endif
	  {{ Form::text('value', '', array('class' => 'form-control', 'placeholder' => 'Wert')) }}
	  {{ Form::submit('Speichern', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
	<br />
	<table class="table table-striped">
	    <tr>
	      <th>ID</th>
	      <th>Einstellung</th>
	      <th>Wert</th>
	      <th>Zuletzt geändert</th>
	      <th class="edit">Bearbeiten</th>
	    </tr>
	    @if(count(Setting::all()) > 0)
	      @foreach(Setting::all() as $setting)
	      <tr>
	        <td>{{ $setting->id }}</td>
	        <td>{{ $setting->name }}</td>
	        <td>{{ $setting->value }}</td>
	        <td>{{ date_format(date_create_from_format('Y-m-d H:i:s', $setting->updated_at), 'd.m.Y H:i') }}</td>
	        <td class="edit">
	          {{ Form::open(array('route' => array('settings.edit', $setting->id), 'method' => 'get')) }}
	            {{ Form::button('<span class="glyphicon glyphicon-edit"></span>', array('type' => 'submit', 'class' => 'btn btn-info')) }}
	          {{ Form::close() }}
	          @if($setting->id != 1 && $setting->id != 2)
	          {{ Form::open(array('route' => array('settings.destroy', $setting->id), 'method' => 'delete')) }}
	            {{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('type' => 'submit', 'name' => 'delete', 'value' => $setting->id, 'class' => 'btn btn-danger')) }}
	          {{ Form::close() }}
	          @endif
	        </td>
	      </tr>
	      @endforeach
	    @else
	     <tr>
	      <td colspan="6"><center><i>-- Es sind keine Einstellungen vorhanden --</i></center></td>
	    </tr>
	    @endif
	</table>
</div>