<x-layout />

<form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
  @csrf

  {{method_field('PATCH')}}
  @include('vehicle.form')
</form>
