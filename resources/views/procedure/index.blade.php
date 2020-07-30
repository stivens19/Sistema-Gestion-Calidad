@extends('layouts.app')

@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h1 class="card-title">Procedimientos</h1>
       </div>
    </div>
    <div class="iq-card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#procedureAgregar" style="font-size: 20px;">
            <i class="fa fa-id-card"></i>
        Agregar Procedimiento
        </button>

       
  
        <!-- Modal -->
    <div class="iq-card-body">
         <div class="table-responsive">
         <table id="procedures" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
            <thead>
                <tr>
                  <th>Id</th>
                   <th>Nombre</th>
                   <th>descripcion</th>
                   <th>Archivo</th>
                   <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="cuerpo">
    
                @foreach ($procedures as $procedure)
                <tr>
                    <td class="text-center">{{ $procedure->id }}</td>
                    <td>{{ $procedure->name }}</td>
                    <td>{{ $procedure->description }}</td>
                    <td>
                     <button type="button" class="btn btn-warning abrirpdf" data-toggle="modal" data-target="#pdf">
                        <input type="text" style="display:none;" value="{{ asset($procedure->archivo)}}">
                        PDF-Procedimiento
                     </button> 
                    </td>
                    <td>
                       <div class="flex align-items-center">
                        <a href="{{ route('procedures.show', ['procedure' => $procedure->id]) }}"><i class="fa fa-eye" style="font-size: 20px;"></i></a>
                        
                        <a href="{{ route('procedures.edit', ['procedure' => $procedure->id]) }}"><i class="ri-pencil-line" style="font-size: 20px;"></i></a>

                        <form method="POST" action="{{ route('procedures.destroy', ['procedure' => $procedure->id])}}" class="d-inline">
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

    
</div>
</div>

           



 <!--Modal-->
 <div id="procedureAgregar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Agregar Procedimiento</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
           <form method="POST" action="{{ route('procedures.store') }}" enctype="multipart/form-data">
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
            <div class="form-group">
               <label for="proceso_id">Procesos: </label>
               <select name="proceso_id" class="form-control  @error('proceso_id') is-invalid @enderror" id="proceso_id">
                 <option value="">--Seleccione</option>
                 @foreach ($procesos as $proceso)
                     <option value="{{ $proceso->id }}" 
                     {{ old('proceso_id') == $proceso->id ? 'selected':'' }}>{{ $proceso->name}}</option>
                 @endforeach
               </select>
               @error('categoria')
               <div class="alert alert-primary" role="alert">
                 <strong>{{ $message }}</strong>
               </div>
               @enderror
             </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Agregar Procedimiento</button>
         </div>
         </div>
         
       </form>
      </div>
   </div>
</div>

 {{-- Modal pdf --}}
 <div id="pdf" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Mostrar pdf procedimiento</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
           <div id="pdfcontent">

           {{-- 
               <embed src="{{ asset($document['archivo'])}}" type="application/pdf" width="100%" height="600px" />
--}}
           </div>
         </div>
       <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
       </div>
   </div>
</div>
{{-- @endforeach --}}

</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
    $('#procedures').DataTable();
} );
</script>
<script>
   const cuerpo=document.getElementById('cuerpo');
   const pdfcontent=document.getElementById('pdfcontent');

   cuerpo.addEventListener('click',abrirpdf)
   function abrirpdf(e){
       if(e.target.classList.contains('abrirpdf')){
           let pdfpath=e.target.children[0].value;

           pdfcontent.innerHTML=`
           <embed src="${pdfpath}" type="application/pdf" width="100%" height="600px" />
           `;
       }
   }
</script>
@endsection