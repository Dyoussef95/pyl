@extends('index')

@section('content')
    
   <button type="button" class="btn btn-primary" onclick="location.href='regimen/create'">Agregar Nuevo</button>
   <table class="table" id="tabla" style="width:auto">
      <thead>
         <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Area</th>
            <th scope="col"></th>
         </tr>
      </thead>
      <tbody>
         @foreach($regimenes as $regimen)
            <tr>
               <td>{!! $regimen->nombre !!}</td>
               <td><span class="label label-success">{!! $regimen->area->nombre !!}</span></td>
               <td>
                  <a href="regimen/{{ $regimen->id }}/edit" class="btn btn-success btn-sm">Editar</a>
                  <br>
                  <form action="/regimen/{{ $regimen->id}}" method="POST">
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