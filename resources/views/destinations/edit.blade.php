@extends('layouts.app')


@section('title', 'Editar Destino')


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush


@section('content')
<h1>Editar Destino</h1>
<form action="{{ route('destinations.update',  $destination) }}" method="POST">
    @csrf
    @method('PUT')
     <p>
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="{{ $destination->name }}" required>
    </p>
    <p>
        <label for="country">País</label>
        <input type="text" name="country" id="country" value="{{ $destination->country }}" required>
    </p>

    <p>
        <label for="image">Imagen</label>
        <input
            type="text"
            id="image"
            name="image"
            value="{{ $destination->image }}"
            >
    </p>
    <p>
        <label for="description">Descripción</label>
        <textarea name="description" id="description">{{ $destination->description }}</textarea>
    </p>
    
    <button type="submit">Modificar</button>
</form>
@endsection