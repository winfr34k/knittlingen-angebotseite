@extends('master')
@section('content')
<h2><center>Weihnachtsangebote der Gewerbetreibenden in Knittlingen </center></h2>
<h4><center>Arbeitsgruppe GVV Knittlingen 2020</center></h4>

<table id="example" class="display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Name</th>
			<th>Gültig bis</th>
			<th>Beschreibung</th>
			<th>Firma</th>
			<th>Preis</th>
			<th>Direktlink</th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th>Name</th>
			<th>Gültig bis</th>
			<th>Beschreibung</th>
			<th>Firma</th>
			<th>Preis</th>
			<th>Direktlink</th>
		</tr>
	</tfoot>

	<tbody>
		@foreach($offers as $offer)
		<tr>
			<td>{{ $offer->name }}</td>
			<td>{{ date_format(date_create_from_format('Y-m-d H:i:s', $offer->endDate), 'd.m.Y H:i') }} Uhr</td>
			<td>{{ Str::limit($offer->description) }}</td>
			<td>{{ link_to($offer->company->website, $offer->company->name) }}</td>
			<td>{{ number_format($offer->amount, 2, ',', '.') }}€ inkl. MwSt.</td>
			<td>{{ link_to_route('offers.show', 'Zum Angebot &raquo;', $offer->id) }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop