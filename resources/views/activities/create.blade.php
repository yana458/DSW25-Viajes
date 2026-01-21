@extends('layouts.app')


@section('title', 'Nueva Actividad')


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush


@section('content')
<h1>Nueva Actividad</h1>
<form action="{{ route('activities.store') }}" method="POST">
    @csrf
    <p>
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" required>
    </p>
    <p>
        <label for="destination_id">Destino</label>
        <select name="destination_id" id="destination" required>
            <option value="">Selecciona un destino</option>
            @foreach($destinations as $destination)
                <option value="{{ $destination->id }}">{{ $destination->name }} ({{ $destination->country }})</option>
            @endforeach
        </select>
    </p>
    <p>
        <label for="description">Descripción</label>
        <textarea name="description" id="description" required></textarea>
    </p>
    <p>
        <label for="duration">Duración (minutos)</label>
        <input type="number" name="duration" id="duration" min="1" required>
    </p>
    <p>
        <label for="price">Precio (€)</label>
        <input type="number" name="price" id="price" step="0.01" required>
    </p>
    <p>
        <button type="submit" class="btn-new">Guardar</button>
        <a href="{{ route('activities.index') }}">Cancelar</a>
    </p>


</form>
@endsection