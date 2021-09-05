@extends('layouts.usuario')
@section('titulo','PANEL DE BIENVENIDA')

@section('contenido2')
<div class="columns">
    <div class="column is-12">

        <h1 class="title is-3 has-text-primary titulo-contenido">
            COMPRA DE PRODUCTOS
        </h1>

        <div class="columns">
            <div class="column is-8 is-offset-2 has-text-centered">
                <h1 class="title is-4">BUSCAR PRODUCTOS</h1>
                <form action="/ordenes/buscar_producto" method="POST">
                    @csrf
                    <div class="field has-addons">
                        <p class="control">
                            <span class="select">
                                <select name="cat_id" id="cat_id">
                                    <option value="0">Todas</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->cat_id}}">{{$categoria->cat_nombre}}</option>
                                    @endforeach
                                </select>
                            </span>
                        </p>
                        <p class="control is-expanded">
                            <input name="palabra" id="palabra" class="input" type="text"
                                placeholder="Realizar una busqueda">
                        </p>
                        <p class="control">
                            <button type="submit" class="button is-primary">
                                Buscar
                            </button>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <div class="columns">
            <div class="column is-10 is-offset-1">
                @foreach($productos as $producto)
                <article class="media has-background-light box-rounded box-result">
                    <figure class="media-left">
                        <p class="image is-128x128">
                            <img src="{{asset('$producto->pro_foto')}}">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                            <h4>
                                {{$producto->pro_nombre}}
                                &lt;<small> Categoria: </small> <small>{{$producto->categoria->cat_nombre}}</small>&gt;
                            </h4>
                            <p>
                                <span class="has-text-primary">STOCK:</span>
                                <span>{{$producto->pro_stock}} {{$producto->pro_unidad}}</span>
                                <br>
                                <span class="has-text-primary">PRECIO UNITARIO:</span>
                                <span>{{$producto->pro_precio}} Bs</span>
                                <br>
                            <form action="{{url('ordenes/agregar_producto/'.$producto->pro_id)}}" method="POST">
                                @csrf
                                <div class="field has-addons">
                                    <div class="control">
                                        <input value="1" id="cantidad" name="cant_{{$producto->pro_id}}" required min="1" max="10" class="input"
                                            type="number" placeholder="Cantidad">
                                    </div>
                                    <div class="control">
                                        <button type="submit" class="button is-primary">
                                            Agregar al carrito
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </p>
                            </p>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
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
                    <span class="has-text-info"> PRODUCTO:</span>
                    <span id="prod_nombre"></span>
                </h3>
            </div>
        </section>
        <footer class="modal-card-foot">
            <form id="form_delete" action="" method="POST">
                @method('DELETE')
                @csrf
                <input type="hidden" id="prod_id" name="prod_id" value="">
                <button class="button is-danger">Eliminar</button>
                <button class="button cerrar-dialogo">Cancelar</button>
            </form>
        </footer>
    </div>
</div>


@endsection