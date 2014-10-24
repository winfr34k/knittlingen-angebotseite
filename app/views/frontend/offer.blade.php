@extends('master')
@section('content')
<h3>Angebot: {{ $offer->name }}</h3>
<p>{{ $offer->description }}</p>
<p><b>Gültig bis:</b> {{ $offer->endDate }}</p>
<p><b>Website:</b> {{ link_to($offer->company->website, $offer->company->name) }}</p>
<p><b><i>{{ $offer->amount }}€</i></b> inkl. MwSt</p>
<p>{{ link_to(URL::previous(), '&laquo; Zurück') }}</p>
@stop