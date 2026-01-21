@extends('layouts.app')


@section('title', 'Editar Actividad')


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush


@section('content')
<h1>Editar Actividad</h1>
<form action="{{ route('activities.update', $activity) }}" method="POST">
    @csrf
    @method('PUT')
    <p>
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="{{ $activity->name }}" required>
    </p>
    <p>
        <label for="destination">Destino</label>
        <select name="destination_id" id="destination" required>
            <option value="">Selecciona un destino</option>
            @foreach($destinations as $destination)
                <option value="{{ $destination->id }}" {{ $activity->destination_id == $destination->id ? 'selected' : '' }}>{{ $destination->name }} ({{ $destination->country }})</option>
            @endforeach
        </select>
    </p>
    <p>
        <label for="description">Descripción</label>
        <textarea name="description" id="description" required>{{ $activity->description }}</textarea>
    </p>
    <p>
        <label for="duration">Duración (minutos)</label>
        <input type="number" name="duration" id="duration" min="1" value="{{ $activity->duration }}" required>
    </p>
    <p>
        <label for="price">Precio (€)</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ $activity->price }}" required>
    </p>
    <p>
        <button type="submit" class="btn-new">Guardar</button>
        <a href="{{ route('activities.index') }}">Cancelar</a>
    </p>


</form>
@endsection