<x-layout />

<div class="container__list">
    <div class="header__list">
        <h4 class="title__list">Listado de usuarios</h4>
            <a class="btn btn-success" href="{{route('personas.create')}}">Nuevo</a>
    </div>
    <hr>
    <div class="container__table">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre completo</th>
                    <th style="display: flex;justify-content: center">Historial</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($personas as $persona)
                <tr class="table-active">
                    <td>{{ $persona->nombre}} {{ $persona->apellido}} </td>
                    <td>
                        <a style="display: flex;justify-content: center" class="nav-link" href="{{ route('historial', $persona->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </a>
                    </td>
                    <td class="container__icon">
                        <form method="post" action="{{ route('personas.destroy', $persona->id) }}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary btn-sm" href="{{ route('personas.edit', $persona->id) }}">Editar</a>
                            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar" />
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>