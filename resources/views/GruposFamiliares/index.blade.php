
@extends('index')

@section('content')

<h1>Grupo Familiar de {!!  $interno->nombre  !!} {!!  $interno->apellido  !!}</h1>
    
<a type="button" class="btn btn-info" href={{ route('gruposfamiliares.create', ['interno' => $interno])  }}>Agregar Nuevo</a>
   <br><br>
   @include('GruposFamiliares._index')

@endsection 

