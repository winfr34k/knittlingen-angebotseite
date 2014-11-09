@extends('master')
@section('content')
<h3>Angebot: {{ $offer->name }}</h3>
<p>{{{ nl2br($offer->description) }}}</p>
<p><b>Gültig bis:</b> {{{ date_format(date_create_from_format('Y-m-d H:i:s', $offer->endDate), 'd.m.Y H:i') }}} Uhr</p>
<p><b>Website:</b> {{{ link_to($offer->company->website, $offer->company->name, array('target' => '_blank')) }}}</p>
<p><b><i>{{{ number_format($offer->amount, 2, ',', '.') }}}€</i></b> inkl. MwSt</p>
<p>{{ link_to(URL::previous(), '&laquo; Zurück') }}</p>
<hr />
<h3>Schreiben Sie dem Verkäufer eine E-Mail!</h3>
{{ Form::open(array('route' => array('offers.postMessage', Session::get('offerId'))))  }}
    {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Name'))  }}
    {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'E-Mail Adresse'))  }}
    {{ Form::text('subject', '', array('class' => 'form-control', 'placeholder' => 'Betreff'))  }}
    {{ Form::textarea('message', '', array('class' => 'form-control', 'placeholder' => 'Nachricht'))  }}
    {{ Form::submit('Absenden', array('class' => 'btn btn-primary'))  }}
{{ Form::close()  }}
@stop