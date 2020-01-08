@extends('index')
@section('content')
<nav>
   <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-datos-personales-tab" data-toggle="tab" href="#datos-personales"
         role="tab" aria-controls="datos-personales" aria-selected="true">Datos Personales</a>
      <a class="nav-item nav-link" id="nav-datos-legales-tab" data-toggle="tab" href="#datos-legales" role="tab"
         aria-controls="datos-legales" aria-selected="false">Datos Legales</a>
      <a class="nav-item nav-link" id="nav-datos-salud-tab" data-toggle="tab" href="#datos-salud" role="tab"
         aria-controls="datos-salud" aria-selected="false">Datos de Salud</a>
      <a class="nav-item nav-link" id="nav-grupo-familiar-tab" data-toggle="tab" href="#grupo-familiar" role="tab"
         aria-controls="grupo-familiar" aria-selected="false">Grupo Familiar</a>
   </div>
</nav>

<div class="tab-content" id="nav-tabContent">
   
   <div class="tab-pane fade show active" id="datos-personales" role="tabpanel" aria-labelledby="ndatos-personales-tab">
      Nombre: {!!$interno->nombre!!} <br>
      Apellido: {!!$interno->apellido!!} <br>
      Genero: {{isset($interno->sexo) ? $interno->sexo->nombre : 'SIN INFORMACION'}} <br>
      DNI: {!! isset($interno->numero_documento) ? $interno->numero_documento : 'SIN INFORMACION' !!} <br>
      Domicilio Declarado: {{isset($interno->domicilioDeclarado) ? $interno->domicilioDeclarado : 'SIN INFORMACION'}}
      <br>
      Nacionalidad: {!! isset($interno->nacionalidad) ? $interno->nacionalidad->nombre : 'SIN INFORMACION' !!} <br>
      Localidad: {!! isset($interno->localidad) ? $interno->localidad->nombre : 'SIN INFORMACION' !!} <br>
      Estado Civil: {{ isset($interno->estado_civil) ? $interno->estado_civil->nombre : 'SIN INFORMACION'}} <br>
      Fecha de Nacimiento: {{ isset($interno->fecha_nacimiento) ? $interno->fecha_nacimiento : 'SIN INFORMACION'}} <br>
      Edad: {{isset($interno->fecha_nacimiento) ? $edad : 'SIN INFORMACION' }} <br>
      Nivel de Instruccion: {{isset($interno->nivel_estudio) ? $interno->nivel_estudio->nombre : 'SIN INFORMACION'}}
      <br>
      Situacion Laboral:
      {{isset($interno->situacion_laboral) ? $interno->situacion_laboral->nombre : 'SIN INFORMACION'}} <br>
      Trabajo: {{isset($interno->trabajo) ? $interno->trabajo->nombre : 'SIN INFORMACION'}} <br>
   </div>

   <div class="tab-pane fade" id="datos-legales" role="tabpanel" aria-labelledby="datos-legales-tab">
      @if($historia==null)
         No hay datos registrados...
         <br>
         <a href="../historias/create/{{$interno->id}}" class="btn btn-success btn-sm m-0">Ingresar Datos</a>
      @else
         Legajo: {!!$interno->legajo!!} <br>
         Area: {{$historia->regimen->area->nombre}} <br>
         Regimen: {{$historia->regimen->nombre}} <br>
         Fecha de Ingreso: {{$historia->fecha_inicio}} <br>
         Tipo Delito:
         {{isset($historia->delito_especifico->tipo_delito->nombre) ? $historia->delito_especifico->tipo_delito->nombre : 'SIN INFORMACION'}}
         <br>
         Delito Especifico:
         {{isset($historia->delito_especifico->nombre) ? $historia->delito_especifico->nombre : 'SIN INFORMACION'}} <br>
         Motivo de Ingreso al Programa: {{$historia->motivo_ingreso->nombre}} <br>
         Situacion Procesal:
         {{isset($historia->situacion_procesal->nombre) ? $historia->situacion_procesal->nombre : 'SIN INFORMACION'}}<br>
         Frecuencia de Control:
         {{isset($historia->frecuencia->nombre) ? $historia->frecuencia->nombre : 'SIN INFORMACION'}}<br>
         @if($historia->empleado()->first()->id==Auth::user()->empleado->id)
            <a href="../historias/{{ $historia->id }}/edit" class="btn btn-success btn-sm">Editar</a>
         @endif
      @endif
   </div>

   <div class="tab-pane fade" id="datos-salud" role="tabpanel" aria-labelledby="datos-salud-tab">
      @isset($interno->situacion_salud->id)
      @include('situacionsaluds.index',['situacionsalud' => $interno->situacion_salud])
      @endisset

      @empty($interno->situacion_salud->id)
      No hay datos registrados...
      <br>
      <a href="../situacionsaluds/create/{{$interno->id}}" class="btn btn-primary btn-sm m-0">Ingresar Datos</a>
      @endempty
   </div>

   <div class="tab-pane fade" id="grupo-familiar" role="tabpanel" aria-labelledby="grupo-familiar-tab">
      @if($gruposFamiliares->isEmpty()) 
      No hay datos registrados...
      <br>
      <a href={{ route('gruposfamiliares.index', ['interno' => $interno])  }} class="btn btn-primary btn-sm m-0">Ingresar Datos</a>
   
         
      @else
         @include('GruposFamiliares._index')
      @endif
   </div>
</div>

@endsection