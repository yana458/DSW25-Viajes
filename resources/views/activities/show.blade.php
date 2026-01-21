@extends('layouts.app')

@section('title', 'Detalle de Actividad')

@section('content')
    <h2>{{ $activity->name }}</h2>

    <div style="display:flex; gap:20px; align-items:flex-start; margin-top:16px;">
        <div style="max-width:320px;">
            <img
                src="/images/{{ $activity->destination?->image ?: 'none.jpg' }}"
                alt="{{ $activity->destination?->name ?? 'Destino' }}"
                style="width:100%; border-radius:10px;"
            >
            <p style="margin-top:10px; font-weight:bold;">
                Destino: {{ $activity->destination?->name ?? '—' }}
            </p>
            <p style="color:#666;">
                País: {{ $activity->destination?->country ?? '—' }}
            </p>
        </div>

        <div style="flex:1;">
            <p style="color:#666; font-size: 0.95em;">
                {{ $activity->description }}
            </p>

            <p style="margin-top:12px;">
                <b>Duración:</b> {{ $activity->duration }} min
            </p>

            <p>
                <b>Precio:</b> {{ number_format($activity->price, 2) }}€
            </p>

            <div style="margin-top:20px; display:flex; gap:10px; align-items:center;">
                <a href="{{ route('activities.edit', $activity) }}"
                   class="btn btn-sm"
                   style="background-color: #f39c12; color: white;">
                    Editar
                </a>

                <form action="{{ route('activities.destroy', $activity) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="btn btn-sm"
                            style="background-color: #e74c3c; color: white; border: none; cursor: pointer;"
                            onclick="return confirm('¿Estás seguro de querer eliminar esta actividad?')">
                        Borrar
                    </button>
                </form>

                <a href="{{ route('activities.index') }}" class="btn btn-sm">Volver</a>
            </div>
        </div>
    </div>
@endsection
