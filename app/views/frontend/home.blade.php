@extends('master')
@section('content')
<h2>Offener Adventskalender GVV</h2>
<h4>Arbeitsgruppe GVV Knittlingen 2020 </h4>

<p style="text-align: center;"><strong><u>NEU:</u> Besuchen Sie unsere {{ link_to_route('latenight', 'Late-Night Shopping-Aktion') }} am Donnerstag 11. und 18. Dezember 2014 bis 21.00 Uhr</strong></p>

<div id="offers-wrapper">
    <table id="offers" class="table table-striped table-bordered hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Firma</th>
                <th>Kategorie</th>
                <th>Name</th>
                <th>Endet am</th>
                <th>Beschreibung</th>
                <th>Preis</th>
                <th>Direktlink</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Firma</th>
                <th>Kategorie</th>
                <th>Name</th>
                <th>Endet am</th>
                <th>Beschreibung</th>
                <th>Preis</th>
                <th>Direktlink</th>
            </tr>
        </tfoot>

        <tbody>
            @foreach(Offer::where('startDate', '<=', new DateTime('now'))->where('endDate', '>', new DateTime('now'))->orderBy('id', 'DESC')->get() as $offer)
            <tr>
                <td>{{ link_to($offer->company->website, $offer->company->name, array('target' => '_blank')) }}</td>
                <td>{{ $offer->category->name }}</td>
                <td>{{ $offer->name }}</td>
                <td>{{ date_format(date_create_from_format('Y-m-d H:i:s', $offer->endDate), 'd.m.Y H:i') }} Uhr</td>
                <td>{{ Str::limit(str_replace('&nbsp;', '', filter_var($offer->description, FILTER_SANITIZE_STRING)), 60) }}</td>
                <td>{{ number_format($offer->amount, 2, ',', '.') }}€ inkl. MwSt.</td>
                <td>{{ link_to_route('offers.show', 'Zum Angebot &raquo;', $offer->id, array('class' => 'btn btn-primary')) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop