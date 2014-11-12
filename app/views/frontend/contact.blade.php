@extends('master')
@section('content')
<h3>Kontakt</h3>
<div id="contect">
    <p>Haben Sie Fragen an unseren Webmaster?<br />Schreiben Sie uns doch einfach eine E-Mail!</p>
    {{ Form::open(array('route' => array('contact.postContact')))  }}
        {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Name'))  }}
        {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'E-Mail Adresse'))  }}
        {{ Form::text('subject', '', array('class' => 'form-control', 'placeholder' => 'Betreff'))  }}
        {{ Form::textarea('message', '', array('class' => 'form-control', 'placeholder' => 'Nachricht'))  }}
        {{ Form::submit('Absenden', array('class' => 'btn btn-primary'))  }}
    {{ Form::close()  }}
</div>
@stop