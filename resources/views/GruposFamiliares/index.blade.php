
@extends('index')

@section('content')

<h1>Grupo Familiar de {!!  $interno->nombre  !!} {!!  $interno->apellido  !!}</h1>
    
   <button type="button" class="btn btn-info" onclick="location.href='gruposfamiliares/create'">Agregar Nuevo</button>
   <br><br>
   @include('GruposFamiliares._index')

@endsection 

