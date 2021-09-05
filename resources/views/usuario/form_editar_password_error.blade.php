@extends('layouts.publico')

@section('titulo','FORMULARIO DE AUTENTICACIÓN')

@section('contenido')
<div class="columns box-container">
    <div class="column is-6 is-offset-3 has-text-white">
        <br>
        <article class="message">
            <div class="message-header">
                LOS PASSWORDS NO COINCIDEN
                <div class="message-body content has-text-centered">
                    <a href="/usuarios/{{$usuario->usu_id}}/editar_password" class="button is-primary">Ir atras</a>
                </div>
            </div>
        </article>
    </div>
</div>

@endsection