@extends('layouts.usuario')
@section('titulo','FORMULARIO DE REGISTRO DE USUARIO')

@section('contenido2')
<h1 class="title is-3 has-text-primary titulo-contenido">
    FORMULARIO DE EDICION DE USUARIO
</h1>
<div class="columns">
    <div class="column is-10 is-offset-1">
        <form action="/usuarios/{{$usuario->usu_id}}" method="POST">
            @method('PUT')
            @csrf
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label for="usr">NOMBRES:</label>
                        <div class="control">
                            <input class="input" value="{{old('usu_nombres', $usuario->usu_nombres)}}" type="text"
                                name="usu_nombres" id="usu_nombres" placeholder="Ramiro">
                        </div>
                        @error('usu_nombres')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <label for="usr">APELLIDOS:</label>
                        <div class="control">
                            <input class="input" value="{{old('usu_apellidos', $usuario->usu_apellidos)}}" type="text"
                                name="usu_apellidos" id="usu_apellidos" placeholder="Farfan Quispe">
                        </div>
                        @error('usu_apellidos')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <label for="usr">EMAIL:</label>
                        <div class="control">
                            <input class="input" value="{{old('usu_email', $usuario->usu_email)}}" type="email"
                                name="usu_email" id="usu_email" placeholder="usuario@gmail.com">
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
                        <label for="usr">USUARIO:</label>
                        <div class="control">
                            <input disabled class="input" value="{{old('usu_username'), $usuario->usu_username}}"
                                type="text" name="usu_username" id="usu_username" placeholder="usuario">
                        </div>
                        @error('usu_username')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <label for="usr">PASSWORD:</label>
                        <div class="control">
                            <input disabled class="input" value="{{old('usu_password'), $usuario->usu_password}}"
                                type="password" name="usu_password" id="usu_password" placeholder="contraseña">
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
            <button class="button is-primary">Actualizar Perfil</button>
        </form>
    </div>
</div>

@endsection