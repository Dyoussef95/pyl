@extends('index')

@section('content')

<a href=".." class="btn btn-warning"><i class="fas fa-arrow-left"></i> Volver</a>
    
    <form action="/oficios/tecnico" method="POST" role="form" id='form'>
        <legend>Ingresar nuevo oficio para {{$historia->interno->nombre}}</legend>
        @csrf

        @include('oficios._form')

        <div class="form-group">
            <input type="hidden" name="historia_id" class="form-control" id="" value="{{$historia->id}}">
        </div>
    
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
     
@endsection 