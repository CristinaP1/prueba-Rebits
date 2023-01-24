<x-layout />


<h3>Listado de usuarios</h3>
<a class="nav-link" href="{{route('personas.create')}}">Nueva Persona</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Nombre completo</th>
            <th>Historial</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($personas as $persona)
        <tr class="table-active">
            <td>{{ $persona->nombre}} {{ $persona->apellido}} </td>
            <td>
                <a class="nav-link" href="{{ route('historial', $persona->id) }}">Historial</a>
            </td>
            <td>
            <form method="post" action="{{ route('personas.destroy', $persona->id) }}">
                    @csrf
                    @method('DELETE')
                    <a class="nav-link" href="{{ route('personas.edit', $persona->id) }}">Editar</a>
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>