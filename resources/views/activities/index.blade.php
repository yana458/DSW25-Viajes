@extends('layouts.app')

@section('title', 'Listado de Actividades')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endpush

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Actividades Disponibles</h2>
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