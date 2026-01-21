@extends('layouts.app')

@section('title', 'Listado de Actividades')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endpush

@section('content')

 <a href="{{ route('comments.create') }}" class="btn-new">
            + Nuevo comentario
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Actividad</th>
                <th>Comentario</th>
                <th>Autor</th> 
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($comments as $comment)
                <tr>
                    <td>
                        {{ $comment->activity->name }} ({{$comment->activity->destination->name}})
                    </td>
                    <td >
                        {{ $comment->commentText }}
                    </td>

                    <td>
                        {{ $comment->author }}
                    </td>
                

                    <td class>
                        <a href="{{ route('comments.show', $comment) }}" class="btn btn-sm" style="background-color: #3498db; color: white;">Ver</a>

                        <a href="{{ route('comments.edit', $comment) }}" class="btn btn-sm" style="background-color: #f39c12; color: white;">Editar</a>


                        <form action="{{ route('comments.destroy', $comment) }}"
                            method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm"
                                    style="background-color: #e74c3c; color: white; border: none; cursor: pointer;"
                                    onclick="return confirm('¿Estás seguro de querer eliminar este comentario?')">
                                Borrar
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection