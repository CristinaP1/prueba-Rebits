<div class="mb-3">
    <label for="duenio" class="form-label">Dueño</label>
    <select class="form-select" aria-label="Default select example" id="duenio" name="duenio">
        <option selected>Seleccione</option>
        @foreach($personas as $persona)
        <option value="{{$persona->id}}" {{isset($vehiculo->person_id)? (($persona->id == $vehiculo->person_id)? 'selected':'') : ''}} >{{$persona->nombre}} {{$persona->apellido}}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="marcaVehiculo" class="form-label">Marca</label>
    <input type="text" class="form-control" value="{{isset($vehiculo->marca)?$vehiculo->marca:''}}" id="marcaVehiculo" name="marcaVehiculo">
</div>
<div class="mb-3">
    <label for="modeloVehiculo" class="form-label">Modelo</label>
    <input type="text" class="form-control" value="{{isset($vehiculo->modelo)?$vehiculo->modelo:''}}" id="modeloVehiculo" name="modeloVehiculo">
</div>
<div class="mb-3">
    <label for="anioVehiculo" class="form-label">Año</label>
    <input type="number" class="form-control" value="{{isset($vehiculo->anio)?$vehiculo->anio:''}}" id="anioVehiculo" name="anioVehiculo">
</div>
<div class="mb-3">
    <label for="precioVehiculo" class="form-label">Precio</label>
    <input type="number" class="form-control" value="{{isset($vehiculo->precio)?$vehiculo->precio:''}}" id="precioVehiculo" name="precioVehiculo">
</div>
<div class="mb-3">
    <input type="submit" id="agregar" name="agregar" value="Agregar">
    <button>Cancelar</button>
</div>