@extends('Index')


@section('content')
    
    <form action="/situacionsaludenfermedads" method="POST" role="form" id="form">
        <legend>Crear nuevo Situacion Salud Enfermedad</legend>
    
        @include('situacionsaludenfermedads._form')
        
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
     
@endsection 

