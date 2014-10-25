@extends('master')
@section('content')
<h2><center>Weihnachtsangebote der Gewerbetreibenden in Knittlingen </center></h2>
<h4><center>Arbeitsgruppe GVV Knittlingen 2020</center></h4>

<div id="accordion">
  @foreach($offers as $offer)
  <h3>{{ $offer->name }}</h3>
  <div>
    <div class="lapse">
      Gültig bis: {{ date_format(date_create_from_format('Y-m-d H:i:s', $offer->endDate), 'd.m.Y H:i') }} Uhr
    </div>
    <div class="descripton">
      {{ $offer->description }}
    </div>
    <div class="company">
      {{ link_to($offer->company->website, $offer->company->name) }}
    </div>
    <div class="price">
      {{ number_format($offer->amount, 2, ',', '.') }}€ inkl. MwSt
    </div>
    <div style="clear: both; font-weight: bold;">{{ link_to_route('offers.show', 'Zum Angebot &raquo;', $offer->id) }}</div>
  </div>
  @endforeach
</div>
@stop