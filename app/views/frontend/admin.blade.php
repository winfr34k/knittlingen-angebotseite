@extends('master')
@section('content')
<div id="tabs">
<ul>
  <li><a href="#tabs-1">Angebot erstellen</a></li>
  <li><a href="#tabs-2">Erstellte Angebote verwalten</a></li>
  <li><a href="#tabs-3">Firma verwalten</a></li>
  @if( ! Auth::guest() && Auth::user()->is_admin == 1)
  <li><a href="#tabs-4">Kategorien verwalten</a></li>
  <li><a href="#tabs-5">Benutzerverwaltung</a>
  <li><a href="#tabs-6">System</a></li>
  @endif
</ul>

<div id="tabs-1">
  <h3>Neues Angebot - {{ Auth::user()->company->name }}</h3>
  <form>
    <input type="text" class="form-control" placeholder="Angebotsname">
    <input type="text" class="form-control" placeholder="Preis">
    <input type="text" class="form-control" placeholder="Gültig bis">
    <textarea class="form-control" rows="3" placeholder="Beschreibung"></textarea>
    <button type="submit" class="btn btn-primary">Anlegen</button>
  </form>
</div>

<div id="tabs-2">
  <h3>Eigene Angebote:</h3>
  <table class="table table-striped">
    <tr>
      <th class="offername">Angebotsname</th>
      <th class="pricetable">Preis</th>
      <th class="lapsetable">Gültig bis</th>
      <th>Beschreibung</th>
      <th class="edit">Bearbeiten</th>
      </tr>
      @if(count(Auth::user()->offers) > 0)
        @foreach(Auth::user()->offers as $offer)
        <tr>
          <td class="offername">{{ $offer->name }}</td>
          <td class="pricetable">{{ $offer->amount }}€</td>
          <td class="lapsetable">{{ $offer->endDate }}</td>
          <td>{{ $offer->description }}</td>
          <td class="edit"><button class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button><button class="btn btn-danger icon-t"><span class="glyphicon glyphicon-trash"></span></button></td>
        </tr>
        @endforeach
      @else
      <tr>
        <td colspan="5"><center><i>-- Es sind keine Angebote verfügbar --</i></center></td>
      </tr>
      @endif
  </table>
</div>
<div id="tabs-3">
  <form>
    <h3>Firmenname ändern:</h3>
    <input type="text" class="form-control" placeholder="{{ Auth::user()->company->name }}">
    <h3>Passwort ändern:</h3>
    <input type="password" class="form-control" placeholder="Aktuelles Passwort">
    <input type="password" class="form-control" placeholder="Neues Passwort">
    <input type="password" class="form-control" placeholder="Neues Passwort wiederholen">
    <button type="submit" class="btn btn-primary">Ändern</button>
  </form> 
</div>
@if( ! Auth::guest() && Auth::user()->is_admin == 1)
<div id="tabs-4">
    <h3>Kategorien verwalten</h3>
    <form>
      <input type="text" class="form-control" placeholder="Name der Kategorie">
      <button type="submit" class="btn btn-primary">Anlegen</button>
    </form>

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
          <td class="edit"><button class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button><button class="btn btn-danger icon-t"><span class="glyphicon glyphicon-trash"></span></button></td>
        </tr>
        @endforeach
      @else
       <tr>
        <td colspan="5"><center><i>-- Es sind keine Kategorien vorhanden --</i></center></td>
      </tr>
      @endif
  </table>
</div>
<div id="tabs-5">
  <h3> Neue User Anlegen:</h3>
<form>
  <input type="email" class="form-control" placeholder="E-Mail">
  <input type="text" class="form-control" placeholder="Passwort">
  <input type="text" class="form-control" placeholder="Firmenname">
  <input type="url" class="form-control" placeholder="Webseite">
  <span class="form-control">Admin?: <input type="checkbox"></span>
  <br />
  <button type="submit" class="btn btn-primary">Anlegen</button>
</form>

<h3>Vorhandene User:</h3>
<table class="table table-striped">
    <tr>
      <th>ID</th>
      <th>Firma</th>
      <th>E-Mail Adresse</th>
      <th>Webseite</th>
      <th># Angebote</th>
      <th class="edit">Bearbeiten</th>
    </tr>
    @if(count(Company::all()) > 0)
      @foreach(Company::all() as $company)
      <tr>
        <td>{{ $company->id }}</td>
        <td>{{ $company->name }}</td>
        <td>{{ $company->user->email }}</td>
        <td>{{ link_to($company->website) }}</td>
        <td>{{ count($company->offers) }}</td>
        <td class="edit"><button class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button><button class="btn btn-danger icon-t"><span class="glyphicon glyphicon-trash"></span></button></td>
      </tr>
      @endforeach
    @else
     <tr>
      <td colspan="6"><center><i>-- Es sind keine Nutzer vorhanden --</i></center></td>
    </tr>
    @endif
</table>
</div>
<div id="tabs-6">
<h3>Systemeinstellungen:</h3>
<form>
  <input type="text" class="form-control" placeholder="Einstellung">
  <input type="text" class="form-control" placeholder="Wert">
  <br />
  <button type="submit" class="btn btn-primary">Ändern</button>
</form>
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
        <td>{{ $setting->updated_at }}</td>
        <td class="edit"><button class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></td>
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