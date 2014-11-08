@extends('...master')
@section('content')
<div id="tabs">
  <ul>
    <li><a href="#myOffers">Angebote</a></li>
    <li><a href="#myCompany">Account</a></li>
    @if( ! Auth::guest() && Auth::user()->is_admin == 1)
    <li><a href="#categories">Kategorien</a></li>
    <li><a href="#users">Benutzer</a>
    <li><a href="#settings">System</a></li>
    <li><a href="#help">Hilfe</a></li>
    @endif
  </ul>

  @include('backend.sections.offers')
  @include('backend.sections.myAccount')
  @if( ! Auth::guest() && Auth::user()->is_admin == 1)
  @include('backend.sections.categories')
  @include('backend.sections.users')
  @include('backend.sections.settings')
  @include('backend.sections.help')
  @endif
</div>
@stop