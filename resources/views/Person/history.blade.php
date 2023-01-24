<x-layout />
<!-- Contenedor del historial -->
<div class="container__list">
    <!-- Encabezado del contenedor -->
    <div class="header__list">
        <!-- Titulo del encabezado -->
        <h4 class="title__list">Historial de vehiculos</h4>
    </div>
    <!-- Nombre del duenio de vehiculo -->
    <p><span style="color:#00609C; padding: 0 20px 0 20px;">{{$persona->nombre}} {{$persona->apellido}}<span></p>
    <hr>
    <!-- Contenedor de tabla de vehiculos-->
    <div class="container__table">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($vehiculos as $vehiculo)
                <tr class="table-active">
                    <td>{{$vehiculo->marca}}</td>
                    <td>{{$vehiculo->modelo}}</td>
                    <td>{{$vehiculo->anio}}</td>
                    <td>{{$vehiculo->precio}}</td>
                    @if($vehiculo->delete_at)
                    <td><span class="badge rounded-pill bg-success">Activo</span></td>
                    @else
                    <td><span class="badge rounded-pill bg-danger">Eliminado</span></td>
                    @endif
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