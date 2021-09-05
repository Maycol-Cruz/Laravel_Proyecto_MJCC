@extends('layouts.publico')

@section('titulo','FORMULARIO DE AUTENTICACIÓN')

@section('contenido')
<div class="columns box-container">
    <div class="column is-6 is-offset-3 has-text-white">
        <br>
        <article class="message">
            <div class="message-header">
                USUARIO CREADO CORRECTAMENTE
                <div class="message-body content has-text-centered">
                    Puede Iniciar sesion con las siguientes credenciales
                    <h4 class="has-text-primary">USUARIO:<span class="has-text-grey">{{$usuario}}</span></h4>
                    <h4 class="has-text-primary">PASSWORD:<span class="has-text-grey">{{$password}}</span></h4>
                    <a href="/login" class="button is-primary">Iniciar Sesion</a>
                </div>

            </div>

        </article>
    </div>
</div>

@endsection