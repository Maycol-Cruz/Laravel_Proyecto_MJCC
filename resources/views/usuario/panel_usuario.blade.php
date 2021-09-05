@extends('layouts.usuario')
@section('titulo','PANEL DE BIENVENIDA')

@section('contenido2')
<h1 class="title is-3 titulo-contenido">
    PANEL DE USUARIO
</h1>
<h3 class="title is-4">
    BIENVENIDO {{Str::upper($usuario->usu_nombres)}}
</h3>
<div class="has-text-centered">
    ESTE ES UN RESUMEN DE TUS OPERACIONES
</div>
<div class="columns">
    <div class="column is-4">
        <article class="message">
            <div class="message-header has-text-centered">
                <p>TOTAL ORDENES</p>
            </div>
            <div class="message-body has-text-centered">
                <p style="font-size: 4em">4</p>
            </div>
        </article>
    </div>
    <div class="column is-4">
        <article class="message">
            <div class="message-header has-text-centered">
                <p>ORDENES PAGADAS</p>
            </div>
            <div class="message-body has-text-centered">
                <p style="font-size: 4em">2</p>
            </div>
        </article>
    </div>
    <div class="column is-4">
        <article class="message">
            <div class="message-header has-text-centered">
                <p>METODOS DE PAGO</p>
            </div>
            <div class="message-body has-text-centered">
                <p style="font-size: 4em">3</p>
            </div>
        </article>
    </div>
</div>
@endsection