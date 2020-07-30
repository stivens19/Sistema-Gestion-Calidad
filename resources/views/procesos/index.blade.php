@extends('layouts.app')

@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h1 class="card-title">Procesos</h1>
       </div>
    </div>
    <div class="iq-card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#processAgregar" style="font-size: 20px;">
            <i class="fa fa-id-card"></i>
        Agregar Proceso
        </button>

       
  
        <!-- Modal -->
    <div class="iq-card-body">
         <div class="table-responsive">
         <table id="users" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
            <thead>
                <tr>
                  <th>Id</th>
                   <th>Nombre</th>
                   <th>descripcion</th>
                   {{-- <th>Archivo</th> --}}
                   <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
    
                @foreach ($processes as $process)
                <tr>
                    <td class="text-center">{{ $process->id }}</td>
                    <td>{{ $process->name }}</td>
                    <td>{{ $process->description }}</td>
                    {{-- <td>$process->archivo</td> --}}
                    {{-- $process->documents --}}
                    <td>
                       <div class="flex align-items-center">
                        <a href="{{ route('process.show', ['process' => $process->id]) }}"><i class="fa fa-eye" style="font-size: 20px;"></i></a>
                        
                        <a href="{{ route('process.edit', ['process' => $process->id]) }}"><i class="ri-pencil-line" style="font-size: 20px;"></i></a>

                        <form method="POST" action="{{ route('process.destroy', ['process' => $process->id])}}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-center"><i class="fa fa-trash-o" style="font-size: 20px;"></i></button>
                         </form>
                    </td>
                 </tr>          
                @endforeach
                                     
            </tbody>
          </table>
       </div>
         
    </div>
 </div>

    
</div>
</div>

           



 <!--Modal-->
 <div id="processAgregar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Agregar Proceso</h5>

             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
             </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('process.store') }}" enctype="multipart/form-data">
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
                <label for="archivo">Archivo:</label>
                <input id="archivo" type="file" class="form-control @error('archivo') is-invalid @enderror" name="archivo" value="{{ old('archivo') }}" required autocomplete="archivo" autofocus>
                @error('archivo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
             </div>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <button type="submit" class="btn btn-primary">Agregar Proceso</button>
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