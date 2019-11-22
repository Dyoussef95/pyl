<div class="form-group">
    <label for="">Fecha Inicio</label>
<input required type="date" name="fechaInicio" value="{{ isset($historia) ? $historia->fechaInicio : '' }}" class="form-control" id="" placeholder="dd/mm/aaaa">
</div>

@if(isset($interno))
    <div class="form-group">
    <input type="hidden" name="internos_id" class="form-control" id="" value="{{$interno->id}}">
 </div>
@else
    <div class="form-group">
    <select name="internos_id" form="form" class="select2" style="width:400px;">
        @foreach ($internos as $interno)
            <option value={{ $interno->id }}
                @if(isset($historia))
                    {{$historia->interno->legajo==$interno->legajo ? 'selected' : ''}}
                @endif
            >
            {{ $interno->legajo }}</option>
        @endforeach
    </select>
</div>
@endif




<div class="form-group">
    <select name="regimen_id" form="form" class="select2" style="width:400px;">
        @foreach ($regimenes as $regimen)
            <option value={{ $regimen->id }}
                @if(isset($historia))
                    {{$historia->regimen->id==$regimen->id ? 'selected' : ''}}
                @endif
            >
            {{ $regimen->nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <select name="delito_especifico_id" form="form" class="select2" style="width:400px;">
        @foreach ($delitoespecificos as $delitoespecifico)
            <option value={{ $delitoespecifico->id }}
                @if(isset($historia))
                    {{$historia->delito_especifico->id==$delitoespecifico->id ? 'selected' : ''}}
                @endif
            >
            {{ $delitoespecifico->nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <select name="situacion_procesal_id" form="form" class="select2" style="width:400px;">
        @foreach ($situacionprocesales as $situacionprocesal)
            <option value={{ $situacionprocesal->id }}
                @if(isset($historia))
                    {{$historia->situacion_procesal->id==$situacionprocesal->id ? 'selected' : ''}}
                @endif
            >
            {{ $situacionprocesal->nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <select name="motivos_de_ingreso_programa_id" form="form" class="select2" style="width:400px;">
        @foreach ($motivosdeingresoalprograma as $motivodeingresoalprograma)
            <option value={{ $motivodeingresoalprograma->id }}
                @if(isset($historia))
                    {{$historia->motivos_ingreso->id==$motivodeingresoalprograma->id ? 'selected' : ''}}
                @endif
            >
            {{ $motivodeingresoalprograma->nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <select name="frecuencia_id" form="form" class="select2" style="width:400px;">
        @foreach ($frecuenciacontroles as $frecuenciacontrol)
            <option value={{ $frecuenciacontrol->id }}
                @if(isset($historia))
                    {{$historia->frecuencia->id==$frecuenciacontrol->id ? 'selected' : ''}}
                @endif
            >
            {{ $frecuenciacontrol->nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <select name="juzgado_especifico_id" form="form" class="select2" style="width:400px;">
        @foreach ($juzgadoespecificos as $juzgadoespecifico)
            <option value={{ $juzgadoespecifico->id }}
                @if(isset($historia))
                    {{$historia->juzgadoespecifico->id==$juzgadoespecifico->id ? 'selected' : ''}}
                @endif
            >
            {{ $juzgadoespecifico->nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
        <input type="hidden" name="url" class="form-control" id="" value={{URL::previous()}}>
</div>