@extends('layouts.app')

@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
        <h2>Realizar tramite</h2>
        <a href="{{ route('document.create') }}" class="btn btn-warning"><i class="fa fa-id-card"></i>
            Agregar Tramite</a>
       </div>
    </div>
        
    
 
    {{-- dd(auth()->user()->procesos->toArray()) --}}
    <div class="iq-card-body">
        <h3>Actividades</h3>
        
      {{--@foreach ((auth()->user()->procesos->toArray()) as $procesou)
        <h5>{{ $procesou['name'] }}</h5>
        @endforeach  --}}  
        <div class="iq-card-body">
            <div class="table-responsive">
               <table id="tramites" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                 <thead>
                     <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                     </tr>
                 </thead>
                 <tbody id="cuerpo">
                    @isset($proceso)
                    <h4>{{ $proceso->name }}</h4>
                    @foreach (($proceso->documents->toArray()) as $document)
                    <tr>
                        <td class="text-center">{{ $document['name'] }}</td>
                        <td class="text-center">{{ $document['description'] }}</td>
                        <td>
                          <button type="button" class="btn btn-primary abrir" data-toggle="modal" data-target="#pdf">
                              <input type="text" style="display:none;" value="{{ asset($document['archivo'])}}">
                              PDF
                           </button>  
                         
                    {{--<a target="_blank"href="{{ asset($document['archivo'])}}">PDF</a>--}}
                        
                        </td>
                    </tr>
                 
                  @endforeach
                    @endisset
                  
                                
                 </tbody>
               </table>
            </div>
         </div>
      </div>
        
    </div>
</div>
<div>
   {{--   @foreach (($proceso->documents->toArray()) as $document)--}}
    <!--Modal-->
    <div id="pdf" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
           <div class="modal-content">
              <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Agregar Proceso</h5>
    
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
    $('#tramites').DataTable();
} );
</script>
<script>
    const body=document.getElementById('cuerpo');
    const pdfcontent=document.getElementById('pdfcontent');
    body.addEventListener('click',abrirpdf)
    function abrirpdf(e){
        e.preventDefault();
        if(e.target.classList.contains('abrir')){
            let pdftotal=e.target.children[0].value;
            pdfcontent.innerHTML=`
            <embed src="${pdftotal}" type="application/pdf" width="100%" height="600px" />
            `;
        }
    }
</script>
@endsection