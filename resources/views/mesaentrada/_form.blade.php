<div class="form-group">
    <label for="">Nombres:</label>
<input required type="text" name="nombre" value="{{isset($historia)?$historia->interno->nombre:''}}" class="form-control" id="" placeholder="Ingrese los nombres">
</div>
@error('nombre')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


<div class="form-group">
    <label for="">Apellidos:</label>
<input required type="text" name="apellido" value="{{isset($historia)?$historia->interno->apellido:''}}" class="form-control" id="" placeholder="Ingrese los apellidos">
</div>

<div class="form-group">
    <label for="">Ingrese la fecha de inicio del tutelado:</label>
<input required type="date" name="fecha_inicio" value="{{isset($historia) ? $historia->fecha_inicio : $hoy}}" class="form-control" id="fecha_inicio">
</div>

<div class="form-group">
    <label for="">Seleccione el motivo de ingreso:</label>
    <select name="motivo_ingreso_programa_id" form="form" class="select2" style="width: 100%">
        @if (isset($motivoingresoprogramas))
            @foreach ($motivoingresoprogramas as $motivoingresoprograma)
                <option value={{ $motivoingresoprograma->id }}
                    @if(isset($historia->motivo_ingreso))
                        {{$historia->motivo_ingreso->id==$motivoingresoprograma->id ? 'selected' : ''}}
                    @endif
                >{{ $motivoingresoprograma->nombre }}</option>
            @endforeach
        @endif
    </select>
</div>


<div class="form-group">
    <label for="">Seleccione la procedencia:</label>
    <select name="juzgado_especifico_id" form="form" class="select2" style="width: 100%">
        @if (isset($juzgadoespecificos))
            @foreach ($juzgadoespecificos as $juzgadoespecifico)
                <option value={{ $juzgadoespecifico->id }}
                    @isset($historia->juzgadoEspecifico)
                        {{$historia->juzgadoEspecifico->id==$juzgadoespecifico->id ? 'selected' : ''}}
                    @endisset
                >{{ $juzgadoespecifico->nombre }}</option>
            @endforeach
        @endif
    </select>
</div>

<div class="form-group">
    <label for="">Seleccione el regimen:</label>
    <select name="regimen_id" form="form" class="select2" style="width: 100%">
        @if (isset($regimenes))
            @foreach ($regimenes as $regimen)
                <option value={{ $regimen->id }}
                    @isset($historia->regimen)
                        {{$historia->regimen->id==$regimen->id ? 'selected' : ''}}
                    @endisset
                >{{ $regimen->nombre }}</option>
            @endforeach
        @endif
    </select>
</div>

<div class="form-group">
    <label for="">Seleccione el profesional:</label>
    <select name="empleado_id" form="form" class="select2" style="width: 100%">
        @if (isset($empleados))
            @foreach ($empleados as $empleado)
                <option value={{ $empleado->id }}
                    @isset($historia)
                        {{$historia->empleado()->first()->id==$empleado->id ? 'selected' : ''}}
                    @endisset
                >{{ $empleado->apellido }}&nbsp{{ $empleado->nombre }}</option>
            @endforeach
        @endif
    </select>
</div>

<div class="form-group">
    <input type="hidden" name="legajo" class="form-control" id="" value="{{isset($historia) ? $historia->interno->legajo : $nuevoLegajo}}">
</div>

<div class="form-group">
    <input type="hidden" name="url" class="form-control" id="" value={{URL::previous()}}>
</div>

