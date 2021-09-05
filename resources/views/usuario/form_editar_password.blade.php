@extends('layouts.usuario')
@section('titulo','FORMULARIO DE REGISTRO DE USUARIO')

@section('contenido2')
<h1 class="title is-3 has-text-primary titulo-contenido">
    FORMULARIO DE EDICION DE PASSWORD
</h1>
<div class="columns">
    <div class="column is-10 is-offset-1">
        <form action="/usuarios/update_password/{{$usuario->usu_id}}" method="POST">
            @method('PUT')
            @csrf
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label for="usr">NOMBRES:</label>
                        <div class="control">
                            <input disabled class="input" value="{{old('usu_nombres', $usuario->usu_nombres)}}"
                                type="text" name="usu_nombres" id="usu_nombres" placeholder="Ramiro">
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
                            <input disabled class="input" value="{{old('usu_apellidos', $usuario->usu_apellidos)}}"
                                type="text" name="usu_apellidos" id="usu_apellidos" placeholder="Farfan Quispe">
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
                            <input disabled class="input" value="{{old('usu_email', $usuario->usu_email)}}" type="email"
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
                        <label for="usr">PASSWORD ANTIGUO:</label>
                        <div class="control">
                            <input class="input" value="{{old('usu_password_antiguo'), $usuario->usu_password_antiguo}}"
                                type="text" name="usu_password_antiguo" id="usu_password_antiguo" placeholder="contraseña antigua">
                        </div>
                        @error('usu_password_antiguo')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <label for="usr">PASSWORD NUEVO:</label>
                        <div class="control">
                            <input class="input" value="{{old('usu_password_nuevo'), $usuario->usu_password_nuevo}}"
                                type="text" name="usu_password_nuevo" id="usu_password_nuevo" placeholder="contraseña nueva">
                        </div>
                        @error('usu_password_nuevo')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="button is-primary">Actualizar Password</button>
        </form>
    </div>
</div>

@endsection