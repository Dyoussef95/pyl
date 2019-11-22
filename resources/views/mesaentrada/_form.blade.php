<div class="form-group">
    <label for="">Nombres:</label>
<input required type="text" name="nombre" value="" class="form-control" id="" placeholder="Ingrese los nombres">
</div>
@error('nombre')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


<div class="form-group">
    <label for="">Apellidos:</label>
<input required type="text" name="apellidos" value="" class="form-control" id="" placeholder="Ingrese los apellidos">
</div>

<div class="form-group">
    <label for="">Ingrese la fecha de inicio del tutelado:</label>
<input required type="date" name="fecha_inicio" value="{{$hoy}}" class="form-control" id="fecha_inicio">
</div>

<div class="form-group">
    <label for="">Seleccione el motivo de ingreso:</label>
    <select name="motivo_ingreso_programa_id" form="form" class="select2" style="width: 100%">
        @if (isset($motivoingresoprogramas))
            @foreach ($motivoingresoprogramas as $motivoingresoprograma)
                <option value={{ $motivoingresoprograma->id }}>{{ $motivoingresoprograma->nombre }}</option>
            @endforeach
        @endif
    </select>
</div>

<div class="form-group">
    <label for="">Seleccione la procedencia:</label>
    <select name="juzgado_especifico_id" form="form" class="select2" style="width: 100%">
        @if (isset($juzgadoespecificos))
            @foreach ($juzgadoespecificos as $juzgadoespecifico)
                <option value={{ $juzgadoespecifico->id }}>{{ $juzgadoespecifico->nombre }}</option>
            @endforeach
        @endif
    </select>
</div>

<div class="form-group">
    <input type="hidden" name="legajo" class="form-control" id="" value={{$nuevoLegajo}}>
</div>

<div class="form-group">
    <input type="hidden" name="url" class="form-control" id="" value={{URL::previous()}}>
</div>

