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
                <label for="unidad_id">Unidad:</label>
                <select type="text" class="form-control" id="unidad_id" name="unidad_id" value="{{ old('unidad_id') }}">
                    <option>Elige una unidad</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="detalles">Detalle:</label>
                <textarea class="form-control" id="detalles" name="detalles" rows="2" value="{{ old('detalles') }}"></textarea>
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
                <label for="marca_id">Nombre:</label>
                <select type="text" class="form-control" id="marca_id" name="marca_id" value="{{ old('marca_id') }}">
                    <option>Elige una marca</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Agregar</button>
        <a  class="btn btn-info" href="{{ route('ingredientes.lista') }}">
            <i class="material-icons">arrow_back</i>
        </a>
    </form>
@endsection