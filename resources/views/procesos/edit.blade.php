@extends('layouts.app')

@section('content')
<div class="iq-card">
    <form method="POST" action="{{ route('process.update', ['process' => $process->id]) }}">
        @csrf
        @method('PATCH')
    <div class="form-group col-md-12">
        <label for="name">Nombre:</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $process->name }}" required autocomplete="name" autofocus>

     </div>
     <div class="form-group col-md-12">
        <label for="description">Descripcion:</label>
        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') ?? $process->description }}" required autocomplete="description">
     </div>
     
  </div>
     <a href="{{ route('process.index') }}" class="btn btn-danger">Volver</a>
     <button type="submit" class="btn btn-primary">Editar</button>
</form>
 </div>
@endsection
