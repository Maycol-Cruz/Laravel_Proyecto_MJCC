@extends('layouts.admin')
@section('titulo','LISTA DE USUARIOS')

@section('contenido2')
<div class="columns">
    <div class="column is-12">

        <h1 class="title is-3 has-text-primary titulo-contenido">
            LISTA DE USUARIOS
        </h1>
        <table class="table is-bordered is-12">
            <thead>
                <th>ID</th>
                <th>NOMBRES Y APELLIDOS</th>
                <th>NOMBRE DE USUARIO</th>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td class="td-id">{{$usuario->usu_id}}</td>
                    <td class="td-nombre">{{$usuario->usu_nombres}} {{$usuario->usu_apellidos}}</td>
                    <td>{{$usuario->usu_username}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>


<div class="modal" id="dialogo">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Modal title</p>
        </header>
        <section class="modal-card-body">
          <!-- Content ... -->
          <div class="content">
            <p>Esta seguro de eliminar el siguiente registro:</p>
            <h3 class="has-text-centered">
               <span class="has-text-primary"> PRODUCTO:</span>
                <span id="prod_nombre"></span>
            </h3>
        </div>
        </section>
        <footer class="modal-card-foot">
            <form id="form_delete" action="categorias/" method="POST">
                @method('DELETE')
                @csrf
                <input type="hidden" id="prod_id" name="prod_id" value="">
                <button type="submit" class="button is-danger">Eliminar</button>
                <a class="button cerrar-dialogo">Cancelar</a>
            </form>
        </footer>
      </div>
</div>


@endsection
