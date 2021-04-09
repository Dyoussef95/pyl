@extends('index')

@section('content')


<h1><a href="javascript:history.back()" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Asistidos</a> OFICIOS DE {{$historia->interno->nombre}}</h1>



<button type="button" class="btn btn-primary" onclick="location.href='{{$historia->id}}/create'">Agregar Nuevo</button>
<br><br>
<div class="table-responsive">
   <table class="table table-striped" id="tabla" style="width:auto">
      <thead class="thead-dark">
         <tr>
         <th>Fecha</th>
                        <th>Numero</th>
                        <th>Descripcion</th>
                        <th>Procedencia</th>
                        <th></th>
                        <th></th>
         </tr>
      </thead>
      <tbody>
        @foreach($historia->oficios as $oficio)
         <tr>
         <td>{!! $oficio->fecha !!}</td>
                        <td>{!! $oficio->numero !!}</td>
                        <td>{!! $oficio->descripcion !!}</td>
                        <td>
                           @isset($oficio->procedencia_id)
                              {!! $juzgados->find($oficio->procedencia_id)->nombre !!}
                           @endisset
                        </td>
            
            <td>
               <a href="usuarios/ $empleado->user_id /edit" class="btn btn-success btn-sm">Editar</a>
            </td>
            <td>
               <form action="/usuarios/ $empleado->user_id " method="POST">
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