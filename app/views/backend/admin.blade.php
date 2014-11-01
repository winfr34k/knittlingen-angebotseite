@extends('...master')
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

  @include('backend.sections.offers')
  @include('backend.sections.myAccount')
  @if( ! Auth::guest() && Auth::user()->is_admin == 1)
  @include('backend.sections.categories')
  @include('backend.sections.users')
  @include('backend.sections.settings')
  @endif
</div>
@stop