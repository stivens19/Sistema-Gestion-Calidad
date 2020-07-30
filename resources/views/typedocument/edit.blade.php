@extends('layouts.app')

@section('content')
<div class="iq-card">
    <form method="POST" action="{{ route('typedocument.update', ['typedocument' => $typedocument->id]) }}">
        @csrf
        @method('PATCH')
    <div class="form-group col-md-12">
        <label for="name">Nombre::</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $typedocument->name }}" required autocomplete="name" autofocus>

     </div>
     <div class="form-group col-md-12">
        <label for="description">Descripcion:</label>
        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') ?? $typedocument->description }}" required autocomplete="description">
     </div>
     
  </div>
     <a href="{{ route('typedocument.index') }}" class="btn btn-danger">Volver</a>
     <button type="submit" class="btn btn-primary">Editar tipo documento</button>
</form>
 </div>
@endsection
