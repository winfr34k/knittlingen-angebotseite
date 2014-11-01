<div id="categories">
	@if(count(Input::old()) > 0 && Input::old('id'))
     <h3>Kategorie ändern:</h3>
     {{ Form::open(array('route' => array('categories.update', Input::old('id')), 'method' => 'put')) }}
     @else
     <h3>Kategorien verwalten</h3>
     {{ Form::open(array('route' => 'categories.store')) }}
     @endif
       {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Name der Kategorie')) }}
       {{ Form::submit('Speichern', array('class' => 'btn btn-primary')) }}
     {{ Form::close() }}

     <h3>Vorhandene Kategorien:</h3>
     <table class="table table-striped">
         <tr>
           <th>ID</th>
        <th>Name</th>
        <th># Angebote in Kategorie</th>
        <th class="edit">Bearbeiten</th>
      </tr>
      @if(count(Category::all()) > 0)
        @foreach(Category::all() as $category)
        <tr>
          <td>{{ $category->id }}</td>
          <td>{{ $category->name }}</td>
          <td>{{ count($category->offers) }}</td>
          <td class="edit">
          {{ Form::open(array('route' => array('categories.edit', $category->id), 'method' => 'get')) }}
            {{ Form::button('<span class="glyphicon glyphicon-edit"></span>', array('type' => 'submit', 'class' => 'btn btn-info')) }}
          {{ Form::close() }}
          @if($category->id != 1)
            {{ Form::open(array('route' => array('categories.destroy', $category->id), 'method' => 'delete')) }}
              {{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('type' => 'submit', 'name' => 'delete', 'value' => $category->id, 'class' => 'btn btn-danger')) }}
            {{ Form::close() }}
          @endif
      </td>
        </tr>
        @endforeach
      @else
       <tr>
        <td colspan="5"><center><i>-- Es sind keine Kategorien vorhanden --</i></center></td>
      </tr>
      @endif
  </table>
</div>