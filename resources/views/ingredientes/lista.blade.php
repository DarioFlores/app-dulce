@extends('master')
@section('titulo','Lista')
@section('contenido')
    <main role="main" class="container">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">{{ $titulo }}</h6>

            @forelse($ingredientes as $ing)
                <div class="media text-muted pt-3 col-6">
                    <img src="img/Leche-Veronica-1-L.jpg" width="50px" height="50px" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">{{ $ing->nombre }}</strong>
                        {{ $ing->marca->nombre }}
                    </p>
                </div>
            @empty
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">No tenemos ingredientes aun</strong>
                    </p>
                </div>
            @endforelse

            <small class="d-block text-right mt-3">
                <a href="#">All updates</a>
            </small>
        </div>
    </main>
@endsection