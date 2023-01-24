<div class="container__list">
  <div class="header__list">
    <h5 class="title__list">Registro de usuario</h5>
  </div>
  <div class="container__form">
    <div class="row">
      <div class="col-6">
        <div class="mb-3">
          <label for="nombreUsuario" class="form-label">Nombre</label>
          <input type="text" class="form-control" value="{{isset($persona->nombre)?$persona->nombre:''}}" id="nombreUsuario" name="nombreUsuario">
          @error('nombreUsuario')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3">
          <label for="apellidoUsuario" class="form-label">Apellido</label>
          <input type="text" class="form-control" value="{{isset($persona->apellido)?$persona->apellido:''}}" id="apellidoUsuario" name="apellidoUsuario">
          @error('apellidoUsuario')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="mb-3">
        <label for="correoUsuario" class="form-label">Correo</label>
        <input type="email" class="form-control" value="{{isset($persona->correo)?$persona->correo:''}}" id="correoUsuario" name="correoUsuario">
        @error('correoUsuario')
          <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
    </div>
    <hr>
    <div class="mb-3">
      <input type="submit" class="btn btn-success btn-sm" id="agregar" name="agregar" value="Agregar">
      <a class="btn btn-primary btn-sm" href="{{ route('personas.index') }}">Cancelar</a>
    </div>
  </div>
</div>