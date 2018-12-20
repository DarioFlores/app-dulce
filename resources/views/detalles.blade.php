@extends('master2')
@section('titulo','Detalles')
@section('contenido')
    <main role="main" class="container">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">{{ $ing->nombre }}</h6>

                <div class="media text-muted pt-3 col-6">
                    <img src="../img/Leche-Veronica-1-L.jpg" width="50px" height="50px" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">{{ $ing->nombre }}</strong>
                        {{ $ing->marca->nombre }}
                    </p>
                </div>
        </div>
    </main>

@endsection