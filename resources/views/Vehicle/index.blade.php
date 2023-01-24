<x-layout />
<!-- Se incluye la componente toast -->
@include('components.toast')

<!-- Contenedor del listado de vehiculos -->
<div class="container__list">
    <!-- Encabezado del listado -->
    <div class="header__list">
        <!-- Titulo del encabezado -->
        <h4 class="title__list">Listado de vehiculos</h4>
        <!-- Boton para agregar un nuevo vehiculo -->
        <a class="btn btn-success" href="{{route('vehiculos.create')}}">Nuevo</a>
    </div>
    <hr>
    <!-- Contenedor de la tabla de vehiculos -->
    <div class="container__table">
        <!-- Tabla de vehiculos -->
        <table class="table  table-striped table-hover">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Usuario</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($vehiculos as $vehiculo)
                <tr class="table-active">
                    <td>{{$vehiculo->marca}}</td>
                    <td>{{$vehiculo->modelo}}</td>
                    <td>{{$vehiculo->anio}}</td>
                    <td>{{$vehiculo->precio}}</td>
                    <td>{{$vehiculo->person->nombre}} {{$vehiculo->person->apellido}}</td>
                    <td class="container__icon">
                        <form method="post" action="{{ route('vehiculos.destroy', $vehiculo->id) }}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary btn-sm" href="{{ route('vehiculos.edit', $vehiculo->id) }}">Editar</a>
                            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar" />
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Paginacion de vehiculos -->
        <div class="paginator">
            {{ $vehiculos->links() }}
        </div>
    </div>
</div>