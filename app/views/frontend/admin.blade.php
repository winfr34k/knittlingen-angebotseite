@extends('master')
@section('content')
<div id="tabs">
  <ul>
    <li><a href="#myOffers">Angebote verwalten</a></li>
    <li><a href="#myCompany">Account verwalten</a></li>
    @if( ! Auth::guest() && Auth::user()->is_admin == 1)
    <li><a href="#categories">Kategorien verwalten</a></li>
    <li><a href="#users">Benutzerverwaltung</a>
    <li><a href="#settings">Systemverwaltung</a></li>
    @endif
  </ul>

  <div id="myOffers">
    <script>
    $(function() {
      $( ".date" ).datepicker({
        showWeek: true,
        dateFormat: 'yy-mm-dd',
        dayNamesShort: $.datepicker.regional.de.dayNamesShort,
        dayNames: $.datepicker.regional.de.dayNames,
        monthNamesShort: $.datepicker.regional.de.monthNamesShort,
        monthNames: $.datepicker.regional.de.monthNames,
        firstDay: 1
      });
    });
    </script>
    @if(count(Input::old()) > 0 && Input::old('id') && Input::old('type') == 'offer')
    <h3>Angebot ändern:</h3>
    {{ Form::open(array('route' => array('offers.update', Input::old('id')), 'method' => 'put')) }}
    @else
    <h3>Neues Angebot anlegen - {{ Auth::user()->company->name }}</h3>
    {{ Form::open(array('route' => 'offers.store')) }}
    @endif
      {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Angebotsname')) }}
      {{ Form::text('amount', '', array('class' => 'form-control', 'placeholder' => 'Preis in €')) }}
      {{ Form::text('startDate', '', array('class' => 'form-control date', 'placeholder' => 'Gültig von')) }}
      {{ Form::text('endDate', '', array('class' => 'form-control date', 'placeholder' => 'Gültig bis')) }}
      <span><b>Kategorie:</b> {{ Form::select('category_id', Category::all()->lists('name', 'id'), null, array('class' => 'form-control')) }}</span>
      {{ Form::textarea('description', '', array('rows' => '5', 'class' => 'form-control', 'placeholder' => 'Beschreibung')) }}
      {{ Form::submit('Speichern', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}

    <h3>Erstellte Angebote:</h3>
    <div class="table-responsive">
		<table class="table table-striped table-hover">
		  <tr>
			<th class="offername">Angebotsname</th>
			<th class="pricetable">Preis</th>
			<th class="lapsetable">Gültig bis</th>
			<th>Beschreibung</th>
			<th>Kategorie</th>
			<th class="edit">Bearbeiten</th>
			</tr>
			@if(count(Auth::user()->offers) > 0)
			  @foreach(Auth::user()->offers as $offer)
			  <tr>
				<td class="offername">{{ $offer->name }}</td>
				<td class="pricetable">{{ number_format($offer->amount, 2, ',', '.') }}€</td>
				<td class="lapsetable">{{ date_format(date_create_from_format('Y-m-d H:i:s', $offer->endDate), 'd.m.Y H:i') }}</td>
				<td>{{ $offer->description }}</td>
				<td>{{ $offer->category->name }}</td>
				<td class="edit">
				  {{ Form::open(array('route' => array('offers.edit', $offer->id), 'method' => 'get')) }}
					{{ Form::button('<span class="glyphicon glyphicon-edit"></span>', array('type' => 'submit', 'class' => 'btn btn-info')) }}
				  {{ Form::close() }}
				  {{ Form::open(array('route' => array('offers.destroy', $offer->id), 'method' => 'delete')) }}
					{{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('type' => 'submit', 'name' => 'delete', 'value' => $offer->id, 'class' => 'btn btn-danger')) }}
				  {{ Form::close() }}
				</td>
			  </tr>
			  @endforeach
			@else
			<tr>
			  <td colspan="6"><center><i>-- Es sind keine Angebote verfügbar --</i></center></td>
			</tr>
			@endif
		</table>
	</div>
  </div>

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
  @if( ! Auth::guest() && Auth::user()->is_admin == 1)
  <div id="categories">
      @if(count(Input::old()) > 0 && Input::old('id'))
      <h3>Kategorie ändern:</h3>
      {{ Form::open(array('route' => array('categories.update', Input::old('id')), 'method' => 'put')) }}
      @else
      <h3>Kategorien verwalten</h3>
      {{ Form::open(array('route' => 'categories.store')) }}
      @endif
        {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Name der Kategorie')) }}
        {{ Form::submit('Speichern', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}

      <h3>Vorhandene Kategorien:</h3>
      <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th># Angebote in Kategorie</th>
            <th class="edit">Bearbeiten</th>
          </tr>
          @if(count(Category::all()) > 0)
            @foreach(Category::all() as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>{{ count($category->offers) }}</td>
              <td class="edit">
              {{ Form::open(array('route' => array('categories.edit', $category->id), 'method' => 'get')) }}
                {{ Form::button('<span class="glyphicon glyphicon-edit"></span>', array('type' => 'submit', 'class' => 'btn btn-info')) }}
              {{ Form::close() }}
              @if($category->id != 1)
                {{ Form::open(array('route' => array('categories.destroy', $category->id), 'method' => 'delete')) }}
                  {{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('type' => 'submit', 'name' => 'delete', 'value' => $category->id, 'class' => 'btn btn-danger')) }}
                {{ Form::close() }}
              @endif
          </td>
            </tr>
            @endforeach
          @else
           <tr>
            <td colspan="5"><center><i>-- Es sind keine Kategorien vorhanden --</i></center></td>
          </tr>
          @endif
      </table>
  </div>
  <div id="users">
    @if(count(Input::old()) > 0 && Input::old('id') && Input::old('type') == 'user')
    <h3>Benutzer bearbeiten: {{ Input::old('name')  }}</h3>
    {{ Form::open(array('route' => array('users.update', Input::old('id')), 'method' => 'put')) }}
    @else
    <h3>Neuen Benutzer anlegen:</h3>
    {{ Form::open(array('route' => 'users.store')) }}
    @endif
      {{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'E-Mail Adresse')) }}
      {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
      {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Firmenname')) }}
      {{ Form::text('website', '', array('class' => 'form-control', 'placeholder' => 'Website')) }}
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
              @if($user->id != 1 || $user->company->name != Auth::user()->company->name)
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
  @endif
</div>
@stop