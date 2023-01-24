<div class="mb-3">
    <label for="nombreUsuario" class="form-label">Nombre</label>
    <input type="text" class="form-control" value="{{isset($persona->nombre)?$persona->nombre:''}}" id="nombreUsuario" name="nombreUsuario">
  </div>
  <div class="mb-3">
    <label for="apellidoUsuario" class="form-label">Apellido</label>
    <input type="text" class="form-control" value="{{isset($persona->apellido)?$persona->apellido:''}}" id="apellidoUsuario" name="apellidoUsuario">
  </div>
  <div class="mb-3">
    <label for="correoUsuario" class="form-label">Correo</label>
    <input type="email" class="form-control" value="{{isset($persona->correo)?$persona->correo:''}}" id="correoUsuario" name="correoUsuario">
  </div>
  <div class="mb-3">
    <input type="submit" id="agregar" name="agregar" value="Agregar">
    <button>Cancelar</button>
  </div>