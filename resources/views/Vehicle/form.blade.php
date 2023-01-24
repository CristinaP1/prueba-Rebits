<!-- Contenedor del formulario -->
<div class="container__list">
    <!-- Encabezado del formulario -->
    <div class="header__list">
        <!-- Titulo del formulario -->
        <h5 class="title__list">Registro de vehiculos</h5>
    </div>
    <!-- Contenedor de las entradas del formulario -->
    <div class="container__form">
        <!-- Primera fila del formulario -->
        <div class="row">
            <div class="col-7">
                <!-- Input del nombre del duenio -->
                <div class="mb-3">
                    <label for="duenio" class="form-label">Dueño</label>
                    <select class="form-select" aria-label="Default select example" id="duenio" name="duenio">
                        <option value="" selected>Seleccione</option>
                        @foreach($personas as $persona)
                        <option value="{{$persona->id}}" {{isset($vehiculo->person_id)? (($persona->id == $vehiculo->person_id)? 'selected':'') : ''}}>{{$persona->nombre}} {{$persona->apellido}}</option>
                        @endforeach
                    </select>
                    <!-- Validacion del nombre del duenio -->
                    @error('duenio')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-5">
                <!-- Input de la marca del vehiculo -->
                <div class="mb-3">
                    <label for="marcaVehiculo" class="form-label">Marca</label>
                    <input type="text" class="form-control" value="{{isset($vehiculo->marca)?$vehiculo->marca:''}}" id="marcaVehiculo" name="marcaVehiculo">
                    <!-- Validacion de la marca del vehiculo -->
                    @error('marcaVehiculo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <!-- Segunda fila del formulario -->
        <div class="row">
            <div class="col-5">
                <!-- Input del modelo del vehiculo -->
                <div class="mb-3">
                    <label for="modeloVehiculo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" value="{{isset($vehiculo->modelo)?$vehiculo->modelo:''}}" id="modeloVehiculo" name="modeloVehiculo">
                    <!-- Validacion del modelo del vehiculo -->
                    @error('modeloVehiculo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <!-- Input del anio del vehiculo -->
                <div class="mb-3">
                    <label for="anioVehiculo" class="form-label">Año</label>
                    <input type="number" min="1900" max="2099" step="1" class="form-control" value="{{isset($vehiculo->anio)?$vehiculo->anio:''}}" id="anioVehiculo" name="anioVehiculo">
                    <!-- Validacion del anio del vehiculo -->
                    @error('anioVehiculo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-5">
                <!-- Input del precio del vehiculo -->
                <div class="mb-3">
                    <label for="precioVehiculo" class="form-label">Precio</label>
                    <input type="number" class="form-control" value="{{isset($vehiculo->precio)?$vehiculo->precio:''}}" id="precioVehiculo" name="precioVehiculo">
                    <!-- Validacion del precio del vehiculo -->
                    @error('precioVehiculo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <hr>
        <!-- Botones para agregar o cancelar formulario -->
        <div class="mb-3">
            <input type="submit" class="btn btn-success btn-sm" id="agregar" name="agregar" value="Enviar">
            <a class="btn btn-primary btn-sm" href="{{ route('vehiculos.index') }}">Cancelar</a>
        </div>
    </div>
</div>