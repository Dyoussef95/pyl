<div class="form-group">
    <label for="">Nombre</label>
<input type="text" name="nombre" value="{{ isset($frecuenciacontrol) ? $frecuenciacontrol->nombre : '' }}" class="form-control" id="" placeholder="Ingrese un nombre">
</div>

<div class="form-group">
    <input type="hidden" name="habilitado" class="form-control" id="" value="true">
</div>