<x-layout />

<!-- Formulario de edicion de vehiculo -->
<form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
  @csrf
  {{method_field('PATCH')}}
  <!-- Se incluye la componente de formulario de vehiculo -->
  @include('vehicle.form')
</form>