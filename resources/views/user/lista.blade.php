@extends('master')
@section('titulo','Lista de Usuarios')
@section('contenido')
    <main role="main" class="container">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h4 class="border-bottom border-gray pb-2 mb-0">{{ $titulo }}</h4>

            @include('info')

            @forelse($users as $u)
                <div class="media text-muted pt-3">
                    <img src="img/Leche-Veronica-1-L.jpg" width="50px" height="50px" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">{{ $u->name }}</strong>
                        {{ $u->email }}
                    </p>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a  class="btn btn-info" href="{{ route('user.editar', ['id' => $u->id]) }}">
                            <i class="material-icons">edit</i>
                        </a>
                        <form action="{{ route('user.eliminar', $u) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-info" href="{{ route('user.eliminar', ['id' => $u->id]) }}">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                        <a class="btn btn-info" href="{{ route('user.detalles', ['id' => $u->id]) }}">
                            <i class="material-icons">info</i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">No tenemos Usuarios aun</strong>
                    </p>
                </div>
            @endforelse

            <small class="d-block text-right mt-3">
                <a href="#">All updates</a>
            </small>
        </div>
    </main>
@endsection