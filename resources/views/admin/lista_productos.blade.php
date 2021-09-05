@extends('layouts.admin')
@section('titulo','PANEL DE BIENVENIDA')

@section('contenido2')
<div class="columns">
    <div class="column is-12">

        <h1 class="title is-3 has-text-primary titulo-contenido">
            LISTA DE PRODUCTOS
            <a class="button is-dark btn-float-right" href="/productos/crear">Registrar producto</a>
        </h1>
        <table class="table is-bordered is-12">
            <thead>
                <th>ID</th>
                <th>FOTO</th>
                <th>NOMBRE DEL PRODUCTO</th>
                <th>PRECIO UNITARIO (en Bs)</th>
                <th>OPERACIONES</th>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td class="td-id">{{$producto->pro_id}}</td>
                    <td><img class="thumbnail" src="{{asset($producto->pro_foto)}}"></td>
                    <td class="td-nombre">{{$producto->pro_nombre}}</td>
                    <td>{{$producto->pro_precio}}</td>
                    <td>
                        <a class="button is-dark is-outlined" href="/productos/{{$producto->pro_id}}/editar">Editar</a>
                        <button class="button is-primary is-outlined modal-button" data-target="dialogo" aria-haspopup="true">Eliminar</button><br>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="has-text-centered">
            {{$productos->links()}}
        </div>
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
            <form id="form_delete" action="" method="POST">
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
