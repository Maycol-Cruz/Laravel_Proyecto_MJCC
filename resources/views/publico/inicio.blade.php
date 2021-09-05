@extends('layouts.publico')

@section('titulo','FORMULARIO DE AUTENTICACIÓN')

@section('contenido')

<div class="columns box-container">
    <div class="column is-8 is-offset-2">
        <div class="columns">
            <div class="column is-8 is-offset-2 has-text-centered">
                <br>
                <img class="img-80 " src="/img/laravel-bootcamp.png">
                <br>
                <br>
                <form action="/buscar_producto" method="POST">
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
            <div class="column is-12">
                @foreach($productos as $producto)
                <article class="media has-background-white box-rounded box-result">
                    <figure class="media-left">
                        <p class="image is-128x128">
                            <img src="{{asset($producto->pro_foto)}}">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                            <h3>
                                {{$producto->pro_nombre}}
                                <small>CATEGORIA: </small> <small>{{$producto->categoria->cat_nombre}}</small>
                            </h3>
                            <p>
                                <span class="has-text-primary">STOCK:</span>
                                <span>{{$producto->pro_stock}} {{$producto->pro_unidad}}</span>
                                <br>
                                <span class="has-text-primary">PRECIO UNITARIO:</span>
                                <span>{{$producto->pro_precio}} Bs</span>
                                <br>
                                <a href="/login" class="button is-primary">Agregar al carrito</a>
                            </p>
                            </p>
                        </div>
                    </div>
                </article>
                @endforeach
                <br>
                <div class="has-background-white box-rounded has-text-centered">
                    {{$productos->links()}}
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

@endsection