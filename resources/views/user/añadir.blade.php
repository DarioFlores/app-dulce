@extends('master')
@section('titulo','Añadir')
@section('contenido')
            <h1>Añadir nuevo Usuario</h1>

            @include('errors.validacion')

            <form method="post" action=" {{ route('user.crear') }}" class="needs-validation">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="password">
                </div>
                <button type="submit" class="btn btn-default">Registrar</button>
                <a  class="btn btn-info" href="{{ route('user.lista') }}">
                    <i class="material-icons">arrow_back</i>
                </a>
            </form>

@endsection