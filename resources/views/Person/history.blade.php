<x-layout />
<h3>Historial de vehiculos </h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vehiculos as $vehiculo)
        <tr class="table-active">
            <td>{{$vehiculo->marca}}</td>
            <td>{{$vehiculo->modelo}}</td>
            <td>{{$vehiculo->anio}}</td>
            <td>{{$vehiculo->precio}}</td>
        </tr>
        @endforeach
    </tbody>
</table>