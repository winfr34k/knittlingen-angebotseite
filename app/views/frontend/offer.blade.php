@extends('master')
@section('content')
<h3>Angebot: {{ $offer->name }}</h3>
<p>{{ $offer->description }}</p>
<p><b>Gültig bis:</b> {{ date_format(date_create_from_format('Y-m-d H:i:s', $offer->endDate), 'd.m.Y H:i') }} Uhr</p>
<p><b>Website:</b> {{ link_to($offer->company->website, $offer->company->name) }}</p>
<p><b><i>{{ number_format($offer->amount, 2, ',', '.') }}€</i></b> inkl. MwSt</p>
<p>{{ link_to(URL::previous(), '&laquo; Zurück') }}</p>
@stop