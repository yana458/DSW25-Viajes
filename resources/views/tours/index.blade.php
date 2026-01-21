@extends('layouts.app')

@section('title', 'Tours')

@section('content')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
@endpush

<div class="page-header">
        <h2>Elige tu Tour</h2>
        <a href="{{ route('tours.create') }}" class="btn-new">
            + Nuevo Tour
        </a>
    </div>


<div class="destinations-grid">
        @foreach ($tours as $tour)
            <article class="card">
                
                <div class="card-content">
                    <h3>{{ $tour->name }}</h3>
                    <p>
                         @foreach ($tour->destinations as $destination)
                    <p>{{ $destination->name }}</p>
                        
                    @endforeach
                    
                    <div class="card-actions">
                        <a href="{{ route('tours.show', $tour) }}" class="btn btn-view">Ver Detalles</a>
                         <a href="{{ route('tours.edit', $tour) }}" class="btn btn-view">Editar</a>
                        
                        <form action="{{ route('tours.destroy', $tour) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('¿Seguro?')">Eliminar</button>
                        </form>
                    </div>
                     <p>
                            <p> <h3>Añadir destino al tour</h3></p>
                           
                            <form action="{{ route('tours.attachDestination', ['tour' => $tour]) }}" method="POST">
                                @csrf
                                <select name="destination_id" id="">
                                    @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}">{{ $destination->name}}</option>
                                    @endforeach
                                </select>
                                <button type="submit">Agregar</button>
                            </form>

                        </p>
                </div>
            </article>
        @endforeach
    </div>
@endsection