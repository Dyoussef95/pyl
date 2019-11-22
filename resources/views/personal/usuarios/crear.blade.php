@extends('index')

@section('title','Prision')

@section('content')


    <form action="/usuarios" method="POST" role="form">
        <legend>Agregar Usuario</legend>
    
        <div class="form-group">
            <label for="">Nombre de usuario</label>
            <input type="text" class="form-control" id="" name="nombre" placeholder="Ingrese nombre de usuario">
        </div>

        <div class="form-group">
            <label for="">Contraseña</label>
            <input type="password" class="form-control" id="" name="password" placeholder="Ingrese contraseña">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" id="" name="email" placeholder="Ingrese Email">
        </div>

        <div class="form-group">
            <input type="radio" name="habilitado" value="true" checked>Habilitado<br>
            <input type="radio" name="habilitado" value="false">Inabilitado<br>
        </div>
    
    
        
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection