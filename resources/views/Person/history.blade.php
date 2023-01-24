<x-layout />

<div class="container__list">
    <div class="header__list">
        <h4 class="title__list">Historial de vehiculos</h4>
            <a class="btn btn-success" href="{{route('personas.create')}}">Nuevo</a>
    </div>

    <hr>
    <div class="container__table">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
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
    </div>
</div>