@extends('index')

@section('title','Prision')

@section('content')
    <p>Prision domiciliaria.</p>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Usuario</th>
            <th scope="col">Email</th>
            <th scope="col">Contraseña</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($usuarios as $usuario)
        	<tr>
        		<td>{!! $usuario -> id !!}</td>
        		<td>{!! $usuario -> nombre !!}</td>
        		<td>{!! $usuario -> email !!}</td>
            <td>{!! $usuario -> password !!}</td>
        	</tr>
        	@endforeach
        </tbody>
      </table>

      <button type="button" class="btn btn-primary" onclick="location.href='usuarios/crear'" >Agregar Nuevo</button>
@endsection