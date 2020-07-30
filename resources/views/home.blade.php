@extends('layouts.app')

@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
         <h2>Inicio</h2>
         <a href="{{ route('registers.create') }}" class="btn btn-warning"><i class="fa fa-id-card"></i>
             Registro</a>
        </div>
     </div>
         
     
  
     {{-- dd(auth()->user()->procesos->toArray()) --}}
     <div class="iq-card-body">         
       {{--@foreach ((auth()->user()->procesos->toArray()) as $procesou)
         <h5>{{ $procesou['name'] }}</h5>
         @endforeach  --}}  
             <div class="table-responsive" id="tableproceso">
                 @foreach ($procesos as $proceso)
                     <h3>{{ $proceso->name }}</h3>
                     
                     <button type="button" id="processid" class="btn btn-primary abrirproceso" data-toggle="modal" data-target="#pdfproceso">
                        <input type="text" style="display:none;" value="{{ asset($proceso->archivo)}}">
                        PDF-Proceso
                     </button> 
                     <a href="{{ route('document.show',$proceso->id) }}" class="btn btn-dark">Documentos</a>

                     <table id="tramites" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                        <thead>
                            <tr>
                               <th>Procedimiento</th>
                               <th>Descripcion</th>
                               <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo">
                           @isset($proceso)

                           @foreach (($proceso->procedures->toArray()) as $procedure)
                           <tr>
                               <td class="text-center">{{ $procedure['name'] }}</td>
                               <td class="text-center">{{ $procedure['description'] }}</td>
                               <td>
                                <a href="{{ route('registers.show',$procedure['id']) }}" class="btn btn-warning">REG</a>

                                <button type="button" class="btn btn-primary text-center abrirpdf" data-toggle="modal" data-target="#pdfproceso">
                                 <input type="text" style="display:none;" value="{{ asset($procedure['archivo'])}}">
                                    PDF
                                </button>  
                                           
                               </td>
                               
                           </tr>
                        
                         @endforeach
                           @endisset
                         
                                       
                        </tbody>
                      </table>
                 @endforeach

             </div>
       </div>
         
     </div>
 </div>
 <div>

{{-- Modales --}}
<div>
    {{--   @foreach (($proceso->documents->toArray()) as $document)--}}
     <!--Modal-->
     <div id="pdfproceso" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Mostrar pdf </h5>
     
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
    const tableproceso=document.getElementById('tableproceso');
    const pdfcontent=document.getElementById('pdfcontent');

    tableproceso.addEventListener('click',abrirpdf)
    function abrirpdf(e){
        
        if(e.target.classList.contains('abrirproceso')|| e.target.classList.contains('abrirpdf')){
            let pdfpath=e.target.children[0].value;

            pdfcontent.innerHTML=`
            <embed src="${pdfpath}" type="application/pdf" width="100%" height="600px" />
            `;
        }
    }
</script>
@endsection