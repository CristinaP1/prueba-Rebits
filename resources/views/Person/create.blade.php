<x-layout />

<form action="{{route('personas.store') }}" method="POST">
  @csrf
  @include('person.form')
</form>