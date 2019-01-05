@extends('master')
@section('titulo','Nuevo Ingrediente')
@section('contenido')
    <h4>Crear nuevo ingrediente</h4>

    @include('errors.validacion')

    <form method="post" action=" {{ route('ingredientes.crear') }}" class="needs-validation">
        {{ csrf_field() }}
        <h5>Datos de Ingrediente</h5>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
            </div>
            <div class="form-group col-md-3">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ old('cantidad') }}">
            </div>
            <div class="form-group col-md-3">
                <label for="unidad">Unidad:</label>
                <select type="text" class="form-control" id="unidad" name="unidad" value="{{ old('unidad') }}">
                    <option>Elige una unidad</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="detalle">Detalle:</label>
                <textarea class="form-control" id="detalle" name="detalle" rows="2" value="{{ old('cantidad') }}"></textarea>
            </div>
            <div class="form-group col-md-3">
                <label for="cod_barra">Codigo de Barra:</label>
                <input type="number" class="form-control" id="cod_barra" name="cod_barra" value="{{ old('cod_barra') }}">
            </div>
            <div class="form-group col-md-3">
                <div class="form-check align-content-center">
                    <input class="form-check-input" type="checkbox" id="has_tacc" name="has_tacc" value="{{ old('has_tacc') }}">
                    <label class="form-check-label" for="has_tacc">
                        Sin TACC
                    </label>
                </div>
            </div>
        </div>


        <hr>


        <h5>Datos de Marca</h5>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="marca">Nombre:</label>
                <select type="text" class="form-control" id="marca" name="marca" value="{{ old('marca') }}">
                    <option>Elige una marca</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="calidad">Calidad:</label>
                <input type="number" class="form-control" id="calidad" name="calidad" min="0" max="5" value="{{ old('calidad') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Agregar</button>
        <a  class="btn btn-info" href="{{ route('ingredientes.lista') }}">
            <i class="material-icons">arrow_back</i>
        </a>
    </form>
@endsection