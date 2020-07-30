@extends('layouts.app')

@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h4 class="card-title">Lista de Usuarios</h4>
       </div>
    </div>
    <div class="iq-card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userAgregar" style="font-size: 20px;">
            <i class="fa fa-id-card"></i>
        Agregar Usuario
        </button>
        <!-- Modal -->
    <div class="iq-card-body">
       <div class="table-responsive">
          <table id="users" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
            <thead>
                <tr>
                   <th>Id</th>
                   <th>Nombre</th>
                   <th>Email</th>
                   <th>Rol</th>
                   <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->rol->name }}</td>
                    <td>
                       <div class="flex align-items-center list-user-action">
                       <a class="ml-5" href="{{ route('user.edit', ['user' => $user->id]) }}"><i class="ri-pencil-line" style="font-size: 30px;"></i></a>
                     
                       </div>
                    </td>
                 </tr>          
                @endforeach
                                     
            </tbody>
          </table>
       </div>
    </div>
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#Asociar" style="font-size: 20px;">
      <i class="fa fa-handshake-o" aria-hidden="true"></i>   Asociar Usuario-Proceso
  </button>
 </div>

 <!--Modal-->
 <div id="userAgregar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Agregar Usuario</h5>

             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
             </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('user.store') }}">
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
                <label for="email">Email:</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
             </div>
             <div class="form-group col-md-12">
                <label for="password">Password:</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
          <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <button type="submit" class="btn btn-primary">Agregar Usuario</button>
          </div>
        </form>
       </div>
    </div>
 </div>

 <div id="Asociar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header bg-dark ">
            <h5 class="modal-title text-white" id="exampleModalCenteredScrollableTitle">Asociar Usuario-Proceso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{ route('usuario.asociar') }}">

           @csrf
            <div class="form-group">
               <label for="proceso_id">Proceso </label>
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
             <div class="form-group">
               <label for="user_id">Usuario</label>
               <select name="user_id" class="form-control  @error('user_id') is-invalid @enderror" id="user_id">
                 <option value="">--Seleccione</option>
                 @foreach ($users as $user)
                     <option value="{{ $user->id }}" 
                     {{ old('user_id') == $user->id ? 'selected':'' }}>{{ $user->name}}</option>
                 @endforeach
               </select>
               @error('user_id')
               <div class="alert alert-primary" role="alert">
                 <strong>{{ $message }}</strong>
               </div>
               @enderror
             </div>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-handshake-o" aria-hidden="true"></i>Asociar</button>
         </div>
       </form>
      </div>
   </div>
</div>


@endsection
@section('scripts')
<script>
    $(document).ready(function() {
    $('#users').DataTable();
} );
</script>
@endsection