@extends('layouts.app')


@section('title', 'Nuevo Destino')


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush


@section('content')
<h1>Nuevo Destino</h1>
<form action="{{ route('destinations.store') }}" method="POST">
    @csrf
    <p>
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" required>
    </p>
    <p>
        <label for="country">País</label>
        <input type="text" name="country" id="country" required>
    </p>
    <p>
        <label for="image">Imagen (nombre de archivo en /public/images)</label>
        <input
            type="text"
            id="image"
            name="image"
            placeholder="ej: paris.jpg"
            value="{{ old('image') }}"
            >
        <small>Guarda solo el nombre: <b>paris.jpg</b> (sin /images/)</small>
    </p>
    <p>
        <label for="description">Descripción</label>
        <textarea name="description" id="description" required></textarea>
    </p>
    <p>
        <button type="submit">Guardar</button>
    </p>


</form>
@endsection