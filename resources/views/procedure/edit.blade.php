@extends('layouts.app')

@section('content')
<div class="iq-card">
    <form method="POST" action="{{ route('procedures.update', ['procedure' => $procedure->id]) }}">
        @csrf
        @method('PATCH')
    <div class="form-group col-md-12">
        <label for="name">Nombre:</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $procedure->name }}" required autocomplete="name" autofocus>

     </div>
     <div class="form-group col-md-12">
        <label for="description">Descripcion:</label>
        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') ?? $procedure->description }}" required autocomplete="description">
     </div>
     <div class="form-group col-md-12">
      <label for="archivo">Archivo:</label>
      <input id="archivo" type="file" class="form-control @error('archivo') is-invalid @enderror" name="archivo" value="{{  $procedure->archivo  }}" required autocomplete="archivo" autofocus>
      @error('archivo')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
       @enderror
      </div>
      <div class="form-group">
         <label for="proceso_id">Procesos </label>
         <select name="proceso_id" class="form-control  @error('proceso_id') is-invalid @enderror" id="proceso_id">
           <option value="">--Seleccione</option>
           @foreach ($procesos as $proceso)
               <option value="{{ $proceso->id }}" 
               {{ old('proceso_id') == $proceso->id ? 'selected':'' }}>{{ $proceso->name}}</option>
           @endforeach
         </select>
         @error('proceso_id')
         <div class="alert alert-primary" role="alert">
           <strong>{{ $message }}</strong>
         </div>
         @enderror
       </div>
  </div>
     <a href="{{ route('process.index') }}" class="btn btn-danger">Volver</a>
     <button type="submit" class="btn btn-primary">Editar</button>
</form>
 </div>
@endsection