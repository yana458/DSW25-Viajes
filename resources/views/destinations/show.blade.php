@extends('layouts.app')

@section('title', 'Detalles del destino')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
@endpush

@section('content')
<article class="card">
    <div class="card-image">
        <img src="/images/{{ $destination->image ?: 'none.jpg' }}"
             alt="{{ $destination->name }}">
        <span class="card-badge">{{ $destination->country }}</span>
    </div>

    <div class="card-content">
        <h1>{{ $destination->name }}</h1>
        <p class="description">{{ $destination->description }}</p>

        <p class="activities">
            {{ count($destination->activities) }} actividades
        </p>

        <div class="card-actions">
            <a href="{{ route('destinations.edit', $destination) }}" class="btn btn-view">Editar</a>

            <form action="{{ route('destinations.destroy', $destination) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete" onclick="return confirm('¿Seguro?')">Eliminar</button>
            </form>

            <a href="{{ route('destinations.index') }}" class="btn">Volver</a>
        </div>
    </div>
</article>

{{-- lista de actividades del destino --}}
@if(count($destination->activities) > 0)
    <h2 style="margin-top: 20px;">Actividades</h2>
    <div class="destinations-grid">
        @foreach($destination->activities as $activity)
            <article class="card">
                <div class="card-content">
                    <h3>{{ $activity->name }}</h3>
                    <p class="description">{{ \Illuminate\Support\Str::limit($activity->description, 80) }}</p>
                    <p><b>Precio:</b> {{ $activity->price }}€</p>
                    <p><b>Duración:</b> {{ $activity->duration }} min</p>
                    <div class="card-actions">
                        <a href="{{ route('activities.show', $activity) }}" class="btn btn-view">Ver</a>
                        <a href="{{ route('activities.edit', $activity) }}" class="btn btn-view">Editar</a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endif
@endsection
