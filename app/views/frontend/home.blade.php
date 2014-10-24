@extends('master')
@section('content')
<h2><center>Weihnachtsangebote der Gewerbetreibenden in Knittlingen </center></h2>
<h4><center>Arbeitsgruppe GVV Knittlingen 2020</center></h4>

<div id="accordion">
  @foreach($offers as $offer)
  <h3>{{ $offer->name }}</h3>
  <div>
    <div class="lapse">
      Gültig bis {{ $offer->endDate }}
    </div>
    <div class="descripton">
      {{ $offer->description }}
    </div>
    <div class="company">
      {{ link_to($offer->company->website, $offer->company->name) }}
    </div>
    <div class="price">
      {{ $offer->amount }}€ inkl. MwSt
    </div>
  </div>
  @endforeach
</div>
@stop