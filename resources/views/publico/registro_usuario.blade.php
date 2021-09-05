@extends('layouts.publico')

@section('titulo','FORMULARIO DE AUTENTICACIÓN')

@section('contenido')
<div class="columns box-container">
    <div class="column is-6 is-offset-3 has-text-white">
        <br>
        <div class="has-text-centered">
            <img class="img-80" src="/img/laravel-bootcamp.png">
        </div>
        <br>
        <h2 class="title is-3 has-text-centered has-text-white">REGISTRO DE USUARIO</h2>
        <small>
            Todos los campos son obligatorios
        </small>
        <form action="/usuarios" method="POST">
            @csrf
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="has-text-white" for="usr">NOMBRES:</label>
                        <div class="control">
                            <input class="input" value="{{old('usu_nombres')}}" type="text" name="usu_nombres"
                                id="usu_nombres" placeholder="Ramiro">
                        </div>
                        @error('usu_nombres')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="has-text-white" for="usr">APELLIDOS:</label>
                        <div class="control">
                            <input class="input" value="{{old('usu_apellidos')}}" type="text" name="usu_apellidos"
                                id="usu_apellidos" placeholder="Farfan Quispe">
                        </div>
                        @error('usu_apellidos')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="has-text-white" for="usr">EMAIL:</label>
                        <div class="control">
                            <input class="input" value="{{old('usu_email')}}" type="email" name="usu_email"
                                id="usu_email" placeholder="usuario@gmail.com">
                        </div>
                        @error('usu_email')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="column is-6">
                    <div class="field">
                        <label class="has-text-white" for="usr">USUARIO:</label>
                        <div class="control">
                            <input class="input" value="{{old('usu_username')}}" type="text" name="usu_username"
                                id="usu_username" placeholder="usuario">
                        </div>
                        @error('usu_username')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="has-text-white" for="usr">DEFINA SU PASSWORD:</label>
                        <div class="control">
                            <input class="input" value="{{old('usu_password')}}" type="text" name="usu_password"
                                id="usu_password" placeholder="contraseña">
                        </div>
                        @error('usu_password')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="button is-primary">Registrarme</button>
        </form>
    </div>
</div>

@endsection