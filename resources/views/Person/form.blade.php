<!-- Contenedor de formulario -->
<div class="container__list">
  <!-- Encabezado de formulario -->
  <div class="header__list">
    <!-- Titulo de formulario -->
    <h5 class="title__list">Registro de usuario</h5>
  </div>
  <!-- Contenedor de las entradas de formulario -->
  <div class="container__form">
    <!-- Primera fila de inputs -->
    <div class="row">
      <div class="col-6">
        <!-- Input de nombre -->
        <div class="mb-3">
          <label for="nombreUsuario" class="form-label">Nombre</label>
          <input type="text" class="form-control" value="{{isset($persona->nombre)?$persona->nombre:''}}" id="nombreUsuario" name="nombreUsuario">
          <!-- Validacion del nombre -->
          @error('nombreUsuario')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-6">
        <!-- Input del apellido -->
        <div class="mb-3">
          <label for="apellidoUsuario" class="form-label">Apellido</label>
          <input type="text" class="form-control" value="{{isset($persona->apellido)?$persona->apellido:''}}" id="apellidoUsuario" name="apellidoUsuario">
          <!-- Validacion del apellido -->
          @error('apellidoUsuario')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="col-6">
      <!-- Input del correo -->
      <div class="mb-3">
        <label for="correoUsuario" class="form-label">Correo</label>
        <input type="email" class="form-control" value="{{isset($persona->correo)?$persona->correo:''}}" id="correoUsuario" name="correoUsuario">
        <!-- Validacion del correo -->
        @error('correoUsuario')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>
    <hr>
    <!-- Botones para agregar o cancelar -->
    <div class="mb-3">
      <input type="submit" class="btn btn-success btn-sm" id="agregar" name="agregar" value="Enviar">
      <a class="btn btn-primary btn-sm" href="{{ route('personas.index') }}">Cancelar</a>
    </div>
  </div>
</div>