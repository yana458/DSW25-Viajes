@extends('layouts.app')

@section('title', 'Listado de Actividades')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endpush

@section('content')

<!-- boton filtar por detino -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Actividades Disponibles</h2>
        <form method="GET" action="{{ route('activities.index') }}">
    <select name="destination_id">
        <option value="">-- Todos los destinos --</option>
        @foreach($destinations as $destination)
            <option value="{{ $destination->id }}"
                {{ request('destination_id') == $destination->id ? 'selected' : '' }}>
                {{ $destination->name }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="btn-new">Filtrar</button>

    <a href="{{ route('activities.index') }}" class="btn-new" style="text-decoration:none;">
        Quitar filtro
    </a>
</form>

        <a href="{{ route('activities.create') }}" class="btn-new">
            + Nueva Actividad
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Actividad</th>
                <th>Destino</th>
                <th>Descripción</th> 
                <th class="text-right">Duración</th>
                <th class="text-right">Precio</th>
                <th>Comentarios</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
                <tr>
                    <td style="font-weight: bold; color: #2c3e50;">
                        {{ $activity->name }}
                    </td>

                    <td>
                        {{ $activity->destination->name }}
                    </td>

                    <td style="color: #666; font-size: 0.9em;">
                        {{ Str::limit($activity->description, 50) }}
                    </td>

                    <td class="text-right">
                        {{ $activity->duration }} min
                    </td>

                    <td class="text-right" style="font-weight: bold;">
                        {{ number_format($activity->price, 2) }}€
                    </td>

                    <td>{{ count($activity->comments) }} comentarios</td>

                    <td class="text-center">
                        <a href="{{ route('activities.show', $activity) }}" class="btn btn-sm" style="background-color: #3498db; color: white;">Ver</a>

                        <a href="{{ route('activities.edit', $activity) }}" class="btn btn-sm" style="background-color: #f39c12; color: white;">Editar</a>


                        <form action="{{ route('activities.destroy', $activity) }}"
                            method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm"
                                    style="background-color: #e74c3c; color: white; border: none; cursor: pointer;"
                                    onclick="return confirm('¿Estás seguro de querer eliminar esta actividad?')">
                                Borrar
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection