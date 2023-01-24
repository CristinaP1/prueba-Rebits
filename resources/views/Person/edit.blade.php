<x-layout />

<!-- Formulario para editar persona -->
<form action="{{ route('personas.update', $persona->id) }}" method="POST">
  @csrf
  {{method_field('PATCH')}}
  <!--Se incluye formulario para editar persona  -->
  @include('person.form')
</form>