@extends('layouts.usuario')
@section('titulo','CARRITO DE COMPRAS')

@section('contenido2')
<div class="columns">
    <div class="column is-12">

        <h1 class="title is-3 has-text-primary titulo-contenido">
            CARRITO DE COMPRAS
            <a class="button is-dark btn-float-right" href="/categorias/crear">Registrar categoria</a>
        </h1>
        <table class="table is-bordered is-12">
            <thead>
                <th>ID</th>
                <th>PRODUCTO</th>
                <th>PRECIO UNITARIO</th>
                <th>CANTIDAD</th>
                <th>SUBTOTAL</th>
                <th>OPERACIONES</th>
            </thead>
            <tbody>
                @foreach($detalles as $detalle)
                <tr>
                    <td class="td-id">{{$detalle->dor_id}}</td>
                    <td class="td-nombre">{{$detalle->Prodcucto->pro_nombre}}</td>
                    <td>{{$detalle->dor_precio_unitario}}</td>
                    <td>{{$detalle->dor_cantidad}}</td>
                    <td>{{$detalle->dor_precio_unitario * $detalle->dor_cantidad}}</td>
                    <td>
                        <a class="button is-dark is-outlined" href="/categorias/{{$categoria->cat_id}}/editar">Editar</a>
                        <button class="button is-primary is-outlined modal-button" data-target="dialogo" aria-haspopup="true">Eliminar</button><br>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="has-text-right">TOTAL DE LA ORDEN</td>
                    <td>{{$orden->ord_precio_total}}</td>
                    <td></td>
                </tr>
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
