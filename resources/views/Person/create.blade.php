<x-layout />

<!-- Formulario de persona -->
<form action="{{route('personas.store') }}" method="POST">
  @csrf
  <!-- Se incluye el componente de formulario -->
  @include('person.form')
</form>