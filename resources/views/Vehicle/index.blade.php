<x-layout />

<h3>Listado de Vehiculos</h3>
<a class="nav-link" href="{{route('vehiculos.create')}}">Nuevo Vehiculo</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Precio</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($vehiculos as $vehiculo)
        <tr class="table-active">
            <td>{{$vehiculo->person->nombre}} {{$vehiculo->person->apellido}}</td>
            <td>{{$vehiculo->marca}}</td>
            <td>{{$vehiculo->modelo}}</td>
            <td>{{$vehiculo->anio}}</td>
            <td>{{$vehiculo->precio}}</td>
            <td>
                <form method="post" action="{{ route('vehiculos.destroy', $vehiculo->id) }}">
                    @csrf
                    @method('DELETE')
                    <a class="nav-link" href="{{ route('vehiculos.edit', $vehiculo->id) }}">Editar</a>
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>