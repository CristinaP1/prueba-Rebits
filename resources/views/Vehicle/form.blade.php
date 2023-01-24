<div class="container__list">
    <div class="header__list">
        <h5 class="title__list">Registro de vehiculos</h5>
    </div>
    <div class="container__form">
        <div class="row">
            <div class="col-7">
                <div class="mb-3">
                    <label for="duenio" class="form-label">Dueño</label>
                    <select class="form-select" aria-label="Default select example" id="duenio" name="duenio">
                        <option value="" selected>Seleccione</option>
                        @foreach($personas as $persona)
                        <option value="{{$persona->id}}" {{isset($vehiculo->person_id)? (($persona->id == $vehiculo->person_id)? 'selected':'') : ''}}>{{$persona->nombre}} {{$persona->apellido}}</option>
                        @endforeach
                    </select>
                    @error('duenio')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-5">
                <div class="mb-3">
                    <label for="marcaVehiculo" class="form-label">Marca</label>
                    <input type="text" class="form-control" value="{{isset($vehiculo->marca)?$vehiculo->marca:''}}" id="marcaVehiculo" name="marcaVehiculo">
                    @error('marcaVehiculo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="mb-3">
                    <label for="modeloVehiculo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" value="{{isset($vehiculo->modelo)?$vehiculo->modelo:''}}" id="modeloVehiculo" name="modeloVehiculo">
                    @error('modeloVehiculo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <label for="anioVehiculo" class="form-label">Año</label>
                    <input type="number" min="1900" max="2099" step="1" class="form-control" value="{{isset($vehiculo->anio)?$vehiculo->anio:''}}" id="anioVehiculo" name="anioVehiculo">
                    @error('anioVehiculo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-5">
                <div class="mb-3">
                    <label for="precioVehiculo" class="form-label">Precio</label>
                    <input type="number" class="form-control" value="{{isset($vehiculo->precio)?$vehiculo->precio:''}}" id="precioVehiculo" name="precioVehiculo">
                    @error('precioVehiculo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <hr>
        <div class="mb-3">
            <input type="submit" class="btn btn-success btn-sm" id="agregar" name="agregar" value="Agregar">
            <a class="btn btn-primary btn-sm" href="{{ route('vehiculos.index') }}">Cancelar</a>
        </div>
    </div>
</div>