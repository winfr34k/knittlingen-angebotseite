@extends('master')
@section('content')
<h2>Offener Adventskalender GVV</h2>
<h4>Arbeitsgruppe GVV Knittlingen 2020 </h4>

<div style="overflow: hidden;">
    <table id="offers" class="table table-striped table-bordered hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Firma</th>
                <th>Name</th>
                <th>Gültig bis</th>
                <th>Beschreibung</th>
                <th>Preis</th>
                <th>Direktlink</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Firma</th>
                <th>Name</th>
                <th>Gültig bis</th>
                <th>Beschreibung</th>
                <th>Preis</th>
                <th>Direktlink</th>
            </tr>
        </tfoot>

        <tbody>
            @foreach(Offer::where('startDate', '<=', new DateTime('now'))->where('endDate', '>', new DateTime('now'))->get() as $offer)
            <tr>
                <td>{{ link_to($offer->company->website, $offer->company->name, array('target' => '_blank')) }}</td>
                <td>{{ $offer->name }}</td>
                <td>{{ date_format(date_create_from_format('Y-m-d H:i:s', $offer->endDate), 'd.m.Y H:i') }} Uhr</td>
                <td>{{ Str::limit(strip_tags(htmlspecialchars_decode($offer->description)), 60) }}</td>
                <td>{{ number_format($offer->amount, 2, ',', '.') }}€ inkl. MwSt.</td>
                <td>{{ link_to_route('offers.show', 'Zum Angebot &raquo;', $offer->id, array('class' => 'btn btn-primary')) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop