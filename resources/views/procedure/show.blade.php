@extends('layouts.app')

@section('content')
<div class="iq-card">
   <div class="card">
       <div class="card-body">
           <h2 class="card-title">{{ $procedure->name }}</h2>
           <p class="card-text">{{ $procedure->description }}</p>
       </div>
       <div class="card-footer">
           <a href="{{ route('procedures.index') }}" class="btn btn-danger">Volver</a>
       </div>
   </div>
 </div>
@endsection