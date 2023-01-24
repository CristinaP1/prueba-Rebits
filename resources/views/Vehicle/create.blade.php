<x-layout />

<!-- Formulario de creacion de vehiculo -->
<form action="{{route('vehiculos.store') }}" method="POST">
  @csrf
  <!-- Se incluye la componente de formulario -->
  @include('vehicle.form')
</form>