<x-layout />

<form action="{{ route('personas.update', $persona->id) }}" method="POST">
  @csrf

  {{method_field('PATCH')}}
  @include('person.form')
</form>