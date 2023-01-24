<x-layout />

<form action="{{route('vehiculos.store') }}" method="POST">
  @csrf
  @include('vehicle.form')
</form>