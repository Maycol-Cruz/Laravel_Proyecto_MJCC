@extends('layouts.publico')

@section('titulo','FORMULARIO DE AUTENTICACIÓN')

@section('contenido')
<div class="columns box-container">
    <div class="column is-4 is-offset-4 box-rounded box-login has-text-white">
        <br>
        <img class="logo-login" src="/img/laravel-bootcamp.png">
        <h2 class="title is-3 has-text-centered has-text-white">FORMULARIO DE ACCESO</h2>
        <form action="/login" method="POST">
            @csrf
            <div class="field">
                <label class="has-text-white" for="usr">USUARIO:</label>
                <div class="control">
                    <input class="input" type="text" name="usr" id="usr" placeholder="nombre usuario">
                </div>
            </div>
            @error('usr')
            <div class="notification is-danger">
                <button class="delete"></button>
                {{$message}}
            </div>
            @enderror
            <div class="field">
                <label class="has-text-white" for="usr">PASSWORD:</label>
                <div class="control">
                    <input class="input" type="password" name="pwd" id="pwd" placeholder="contraseña">
                </div>
            </div>
            @error('pwd')
            <div class="notification is-danger">
                <button class="delete"></button>
                {{$message}}
            </div>
            @enderror
            <button class="button is-primary">Ingresar</button>
            <br><br>
            <p>¿Olvidaste tu contraseña? Puedes <a href="#">reestablecer</a></p>
            <p>Si no tienes cuenta <a href="#">registrate</a></p>
        </form>
    </div>
</div>

@endsection