@extends('index')

@section('content')


<h1>Usuarios</h1>



<button type="button" class="btn btn-primary" onclick="location.href='usuarios/create'">Agregar Nuevo</button>
<br><br>
<div class="table-responsive-sm">
   <table class="table table-striped" id="tabla" style="width:auto">
      <thead class="thead-dark">
         <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Usuario</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
            <th scope="col"></th>
         </tr>
      </thead>
      <tbody>
         @foreach($usuarios as $usuario)
         <tr>
            <td>{!! $usuario->empleado->nombre !!}</td>
            <td>{!! $usuario->empleado->apellido !!}</td>
            <td>{!! $usuario->name !!}</td>
            <td>{!! $usuario->email !!}</td>
            <td>
               <a href="usuarios/{{ $usuario->id }}/edit" class="btn btn-success btn-sm">Editar</a>
            </td>
            <td>
               <form action="/usuarios/{{ $usuario->id}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>



@endsection