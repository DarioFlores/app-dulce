@extends('master')
@section('titulo','Detalles')
@section('contenido')
            <h6 class="border-bottom border-gray pb-2 mb-0">{{ $user->name }}</h6>

                <div class="media text-muted pt-3">
                    <img src="../../img/Leche-Veronica-1-L.jpg" width="50px" height="50px" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">{{ $user->email }}</strong>
                    </p>
                    <a  class="btn btn-info" href="{{ route('user.lista') }}">
                        <i class="material-icons">arrow_back</i>
                    </a>
                </div>

@endsection