@extends('layouts.app')

@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h4 class="card-title">Tipos de Documentos</h4>
       </div>
    </div>
    <div class="iq-card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#typeDocumentAgregar" style="font-size: 20px;">
            <i class="fa fa-id-card"></i>
        Agregar Tipo de documento
        </button>
        <!-- Modal -->
    <div class="iq-card-body">
       <div class="table-responsive">
          <table id="tipo" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
            <thead>
                <tr>
                   <th>Nombre</th>
                   <th>Descripcion</th>
                   <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($typedocuments as $typedocument)
                <tr>
                    <td class="text-center">{{ $typedocument->id }}</td>
                    <td>{{ $typedocument->name }}</td>
                    <td>{{ $typedocument->description }}</td>
                    <td>
                       <div class="flex align-items-center list-user-action">
                        <a href="{{ route('typedocument.show', ['typedocument' => $typedocument->id]) }}"><i class="fa fa-eye" style="font-size: 20px;"></i></a>

                       <a href="{{ route('typedocument.edit', ['typedocument' => $typedocument->id]) }}"><i class="ri-pencil-line" style="font-size: 20px;"></i></a>
                     
                       <form method="POST" action="{{ route('typedocument.destroy', ['typedocument' => $typedocument->id])}}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger text-center"><i class="fa fa-trash-o" style="font-size: 20px;"></i></button>
                     </form>
                       </div>
                    </td>
                 </tr>          
                @endforeach
                                     
            </tbody>
          </table>
       </div>
    </div>
 </div>

 <!--Modal-->
 <div id="typeDocumentAgregar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Agregar Tipo de documento</h5>

             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
             </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('typedocument.store') }}">
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
                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
             </div>

          <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
        </form>
       </div>
    </div>
 </div>


@endsection
@section('scripts')
<script>
   $(document).ready(function() {
   $('#tipo').DataTable();
} );
</script>
@endsection