@extends('layouts.app')

@section('title', 'Nuestros Destinos')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
@endpush

@section('content')
    <div class="page-header">
        <h2>Explora el Mundo</h2>
        <a href="" class="btn-new">
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
                    <p class="activities">
                        {{ count($destination->activities) }} actividades
                    </p>
                    
                    <div class="card-actions">
                        <a href="" class="btn btn-view">Ver Detalles</a>
                        
                        <button type="submit" class="btn btn-delete" onclick="return confirm('¿Seguro?')">Eliminar</button>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection