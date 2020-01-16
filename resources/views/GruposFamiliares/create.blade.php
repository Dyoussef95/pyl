@extends('index')

@section('content')
    
    <form action="/frecuenciascontroles" method="POST" role="form">
        <legend>Agregar miembro al grupo familiar de: {!! $interno->nombre !!} {!!$interno->apellido !!}</legend>
    
        @include('GruposFamiliares._form')

    
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
     
@endsection 