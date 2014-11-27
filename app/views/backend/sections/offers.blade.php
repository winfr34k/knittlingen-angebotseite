<div id="myOffers">
@if(count(Input::old()) > 0 && Input::old('id') && Input::old('type') == 'offer')
<h3>Angebot ändern:</h3>
{{ Form::open(array('route' => array('offers.update', Input::old('id')), 'method' => 'put')) }}
@else
<h3>Neues Angebot anlegen - {{ Auth::user()->company->name }}</h3>
{{ Form::open(array('route' => 'offers.store')) }}
@endif
  {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Angebotsname')) }}
  {{ Form::text('amount', '', array('class' => 'form-control', 'placeholder' => 'Preis in €')) }}
  {{ Form::text('startDate', '', array('class' => 'form-control date', 'placeholder' => 'Gültig von')) }}
  {{ Form::text('endDate', '', array('class' => 'form-control date', 'placeholder' => 'Gültig bis')) }}
  <span><b>Kategorie:</b> {{ Form::select('category_id', Category::all()->lists('name', 'id'), null, array('class' => 'form-control')) }}</span>
  {{ Form::textarea('description', '', array('rows' => '5', 'class' => 'form-control editor', 'placeholder' => 'Beschreibung')) }}
  {{ Form::submit('Speichern', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

<h3>Erstellte Angebote:</h3>
<div class="table-responsive">
	<table class="table table-striped table-hover">
	  <tr>
		<th class="offername">Angebotsname</th>
		<th class="pricetable">Preis</th>
		<th class="lapsetable">Gültig bis</th>
		<th>Beschreibung</th>
		<th>Kategorie</th>
		<th>Ersteller</th>
		<th class="edit">Bearbeiten</th>
		</tr>
		@if(Auth::user()->is_admin != '1' && count(Auth::user()->offers) > 0)
		  @foreach(Auth::user()->offers as $offer)
		  <tr>
			<td class="offername">{{ $offer->name }}</td>
			<td class="pricetable">{{ number_format($offer->amount, 2, ',', '.') }}€</td>
			<td class="lapsetable">{{ date_format(date_create_from_format('Y-m-d H:i:s', $offer->endDate), 'd.m.Y H:i') }}</td>
			<td>{{ Str::limit($offer->description) }}</td>
			<td>{{ $offer->category->name }}</td>
			<td>{{ $offer->company->name  }}</td>
			<td class="edit">
			  {{ Form::open(array('route' => array('offers.edit', $offer->id), 'method' => 'get')) }}
				{{ Form::button('<span class="glyphicon glyphicon-edit"></span>', array('type' => 'submit', 'class' => 'btn btn-info')) }}
			  {{ Form::close() }}
			  {{ Form::open(array('route' => array('offers.destroy', $offer->id), 'method' => 'delete')) }}
				{{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('type' => 'submit', 'name' => 'delete', 'value' => $offer->id, 'class' => 'btn btn-danger')) }}
			  {{ Form::close() }}
			</td>
		  </tr>
		  @endforeach
		@elseif(Auth::user()->is_admin == '1' && count(Offer::all()) > 0)
          @foreach(Offer::all() as $offer)
          <tr>
            <td class="offername">{{ $offer->name }}</td>
            <td class="pricetable">{{ number_format($offer->amount, 2, ',', '.') }}€</td>
            <td class="lapsetable">{{ date_format(date_create_from_format('Y-m-d H:i:s', $offer->endDate), 'd.m.Y H:i') }}</td>
            <td>{{ Str::limit(strip_tags($offer->description)) }}</td>
            <td>{{ $offer->category->name }}</td>
            <td>{{ $offer->company->name  }}</td>
            <td class="edit">
              {{ Form::open(array('route' => array('offers.edit', $offer->id), 'method' => 'get')) }}
                {{ Form::button('<span class="glyphicon glyphicon-edit"></span>', array('type' => 'submit', 'class' => 'btn btn-info')) }}
              {{ Form::close() }}
              {{ Form::open(array('route' => array('offers.destroy', $offer->id), 'method' => 'delete')) }}
                {{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('type' => 'submit', 'name' => 'delete', 'value' => $offer->id, 'class' => 'btn btn-danger')) }}
              {{ Form::close() }}
            </td>
          </tr>
          @endforeach
		@else
		<tr>
		  <td colspan="7"><center><i>-- Es sind keine Angebote verfügbar --</i></center></td>
		</tr>
		@endif
	</table>
</div>
</div>