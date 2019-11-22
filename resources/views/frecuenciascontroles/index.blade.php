@extends('index')

@section('content')
    
   <button type="button" class="btn btn-primary" onclick="location.href='frecuenciascontroles/create'">Agregar Nuevo</button>
   <table class="table" id="tabla" style="width:auto">
      <thead>
         <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
         </tr>
      </thead>
      <tbody>
         @foreach($frecuenciascontroles as $frecuenciacontrol)
            <tr>
               <td>{!! $frecuenciacontrol -> nombre !!}</td>
               <td>
                  <a href="frecuenciascontroles/{{ $frecuenciacontrol->id }}/edit" class="btn btn-success btn-sm">Editar</a>
               </td>
               <td>
                  <form action="/frecuenciascontroles/{{ $frecuenciacontrol->id}}" method="POST">
                     @method('DELETE')
                     @csrf
                     <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                  </form>                     
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>

@endsection