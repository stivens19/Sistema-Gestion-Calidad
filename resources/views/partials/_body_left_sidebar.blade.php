<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between bg-warning p-3">
       <a href="index.html">
       <span>FIS UNCP</span>
       </a>
       <div class="iq-menu-bt align-self-center bg-dark">
          <div class="wrapper-menu">
             <div class="line-menu half start"></div>
             <div class="line-menu"></div>
             <div class="line-menu half end"></div>
          </div>
       </div>
    </div>
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">
             <li>
                <a href="{{ route('home') }}" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Inicio</span></a>
             </li>
            

           
           @if (auth()->user()->rol->name==='Administrador')
           <li>
            <a href="{{ route('user.index') }}" class="iq-waves-effect"><i class="ri-user-line"></i><span>Usuarios</span></a>
            </li>
           @endif
             
           @if ((auth()->user()->rol->name==='Administrador') || (auth()->user()->rol->name==='Docente'))
           <li>
            <a href="{{ route('process.index') }}" class="iq-waves-effect"><i class="fa fa-calculator"></i><span>Procesos</span></a>
            </li>
            @endif
            
           @if (auth()->user()->rol->name==='Administrador')
           <li>
            <li>
               <a href="{{ route('procedures.index') }}" class="iq-waves-effect"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Procedimientos</span></a>
            </li>
           @endif

           @if (auth()->user()->rol->name==='Administrador')
           <li>
            <li>
               <a href="{{ route('document.index') }}" class="iq-waves-effect"><i class="fa fa-book" aria-hidden="true"></i><span>Documentos</span></a>
            </li>
           @endif
           @if (auth()->user()->rol->name==='Administrador')
           <li>
            <li>
               <a href="{{ route('typedocument.index') }}" class="iq-waves-effect"><i class="fa fa-file"></i><span>Tipo de documentos</span></a>
            </li>
           @endif
                </ul>
             </li>
          </ul>
       </nav>
       <div class="p-3"></div>
    </div>
 </div>