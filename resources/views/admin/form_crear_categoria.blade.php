@extends('layouts.admin')
@section('titulo','FORMULARIO DE REGISTRO DE CATEGORIA')

@section('contenido2')
<h1 class="title is-3 has-text-primary titulo-contenido">
    FORMULARIO DE REGISTRO DE CATEGORIA
</h1>
<div class="columns is-centered">
    <div class="column is-half">
        <form action="/categorias" method="POST">
            @csrf
            <div class="field">
                <label class="" for="usr">NOMBRE DE CATEGORIA:</label>
                <div class="control">
                    <input class="input" type="text" value="{{old('cat_nombre')}}" name="cat_nombre" id="cat_nombre">
                </div>
                @error('cat_nombre')
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="field">
                <label class="" for="usr">DESCRIPCION DE CATEGORIA:</label>
                <div class="control">
                    <textarea name="cat_descripcion" id="cat_descripcion" cols="30"
                        rows="10">{{old('cat_descripcion')}}</textarea>
                </div>
                @error('cat_descripcion')
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{$message}}
                </div>
                @enderror
            </div>
            <br>
            <button type="submit" class="button is-primary">Guardar datos</button>
        </form>
    </div>
</div>
@endsection