@extends('layouts.app')

@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
         <h2>Registrar</h2>
         </div>
     </div>

    <form method="POST" action="{{ route('registers.store') }}" enctype="multipart/form-data">
        @csrf
    <div class="form-group col-md-12">
        <label for="name">Nombre:</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
     </div>
     <div class="form-group col-md-12">
        <label for="description">Descripcion:</label>
        <textarea name="description" id="description" cols="30" rows="2" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
     </div>
    
     <div class="form-group col-md-12">
        <label for="ruta_drive">Cargar:</label>
        <input id="ruta_drive" type="file" class="form-control @error('ruta_drive') is-invalid @enderror" name="ruta_drive" value="{{ old('ruta_drive') }}" required autocomplete="ruta_drive" autofocus>
        @error('ruta_drive')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
     </div>

     <div class="form-group">
        <label for="procedure_id">Procedimiento </label>
        <select name="procedure_id" class="form-control  @error('procedure_id') is-invalid @enderror" id="procedure_id">
          <option value="">--Seleccione</option>
          @foreach ($procedures as $procedure)
              <option value="{{ $procedure->id }}" 
              {{ old('procedure_id') == $procedure->id ? 'selected':'' }}>{{ $procedure->name}}</option>
          @endforeach
        </select>
        @error('procedure_id')
        <div class="alert alert-primary" role="alert">
          <strong>{{ $message }}</strong>
        </div>
        @enderror
      </div>
  </div>

     <a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>
     <button type="submit" class="btn btn-primary">Registrar</button>

</form>
 </div>

@endsection
