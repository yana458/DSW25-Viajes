@extends('layouts.app')

@section('title', 'Nuestros Destinos')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
@endpush

@section('content')
    <div class="page-header">
        <h2>Explora el Mundo</h2>
        <a href="{{ route('destinations.create') }}" class="btn-new">
            + Nuevo Destino
        </a>
    </div>

    <div class="destinations-grid">
        @foreach ($destinations as $destination)
            <article class="card">
                <div class="card-image">
                    <img src="/images/{{ $destination->image ?? 'none.jpg' }}" 
                         alt="{{ $destination->name }}">
                    <span class="card-badge">{{ $destination->country }}</span>
                </div>

                <div class="card-content">
                    <h3>{{ $destination->name }}</h3>
                    <p class="description">
                        {{ Str::limit($destination->description, 80) }}
                    </p>
                    <a href="{{ route('activities.index', ['activity' => 'destination']) }}" class="activities">
                        {{ count($destination->activities) }} actividades
                    </a>
                    
                    <div class="card-actions">
                        <a href="{{ route('destinations.show', $destination) }}" class="btn btn-view">Ver Detalles</a>
                         <a href="{{ route('destinations.edit', $destination) }}" class="btn btn-view">Editar</a>
                        
                        <form action="{{ route('destinations.destroy', $destination) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('¿Seguro?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection