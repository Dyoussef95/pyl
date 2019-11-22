@extends('index')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.css') }}">

@endsection

@section('content')
   <h1>Mesa de Entrada</h1> 

    <div class="table-responsive">
    <table id="dataTableMesaEntrada" name="dataTableMesaEntrada" class="table table-hover">
      <thead class="thead-dark">
         <tr>
            <th>Legajo</th>  
            <th>Apellidos</th>
            <th>Nombres</th>                           
            <th scope="col"></th>
            <th scope="col"></th>
         </tr>
      </thead>
      <tbody>
         @foreach($internos as $interno)
         <tr>
            <td>{!! $interno->legajo !!}</td>
            <td>{!! $interno->apellido !!}</td>
            <td>{!! $interno->nombre !!}</td>
            <td>
               <a class="btn btn-success btn-sm m-0">Editar</a>
            </td>
            <td>                        
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
@endsection

@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js') }}" defer></script>

<script src="{{ asset('js/mesaEntrada.js') }}" defer></script>

@endsection
