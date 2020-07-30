@extends('layouts.app')

@section('content')
<div class="iq-card">
    <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}">
        @csrf
        @method('PATCH')
    <div class="form-group col-md-12">
        <label for="name">Nombre:</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

     </div>
     <div class="form-group col-md-12">
        <label for="email">Email:</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">
     </div>
     

     <div class="form-group col-md-12">
        <label for="pass">Rol:</label>
        <select class="form-control" name="rol_id">
            <option value="">Seleccionar</option>
            <option value="1">Administrador</option>
            <option value="2">Docente</option>
            <option value="3">Asistente</option>
        </select>
     </div>
  </div>
     <a href="{{ route('user.index') }}" class="btn btn-danger">Volver</a>
     <button type="submit" class="btn btn-primary">Editar Usuario</button>
</form>
 </div>
@endsection
