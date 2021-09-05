@extends('layouts.publico')

@section('titulo','FORMULARIO DE AUTENTICACIÓN')

@section('contenido')
<div class="columns">
    <div class="column is-4 is-offset-4 box-rounded box-login has-text-white">
                <img class="logo-login" src="/img/laravel-bootcamp.png">
                <h2 class="title is-3 has-text-centered has-text-white">FORMULARIO DE ACCESO</h2>
                <form action="/panel">
                    <div class="field">
                        <label class="has-text-white" for="usr">USUARIO:</label>
                        <div class="control">
                            <input class="input" type="text" name="usr" id="usr" placeholder="usuario@gmail.com">
                        </div>
                    </div>
                    <div class="field">
                        <label class="has-text-white" for="usr">PASSWORD:</label>
                        <div class="control">
                            <input class="input" type="password" name="pwd" id="pwd" placeholder="contraseña">
                        </div>
                    </div>
                    <button class="button is-primary">Ingresar</button>
                    <br><br>
                    <p>¿Olvidaste tu contraseña? Puedes <a href="#">reestablecer</a></p>
                    <p>Si no tienes cuenta <a href="#">registrate</a></p>
                </form>
    </div>
</div>

@endsection
