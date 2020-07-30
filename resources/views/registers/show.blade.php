@extends('layouts.app')

@section('content')
<h2>Registros</h2>
<div class="row" id="cuerpo">
@foreach ($registros as $registro)

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                  <span class="badge badge-success">{{ $procedure->name }}</span>
                  <h5 class="card-title">{{ $registro['name'] }}</h5>
                  <p class="card-text">{{ $registro['description'] }}</p>
                  
                  <button type="button" class="btn btn-warning text-center abrirpdf" data-toggle="modal" data-target="#pdf">
                    <input type="text" style="display:none;" value="{{ asset($registro['ruta_drive'])}}">
                       PDF
                   </button>
                </div>
            </div>
        </div>


 
@endforeach
<div>
    {{--   @foreach (($proceso->documents->toArray()) as $document)--}}
     <!--Modal-->
     <div id="pdf" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Mostrar Registro </h5>
     
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
</div>

@endsection
@section('scripts')
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