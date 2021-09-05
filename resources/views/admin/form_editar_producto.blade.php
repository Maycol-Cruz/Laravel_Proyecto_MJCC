@extends('layouts.admin')
@section('titulo','FORMULARIO DE REGISTRO DE PRODUCTO')

@section('contenido2')
<h1 class="title is-3 has-text-primary titulo-contenido">
    FORMULARIO DE EDICION DE PRODUCTO
</h1>

<div class="columns">
    <div class="column is-offset-1">
        <form action="/productos" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="columns">
                <div class="columns is-6">
                    <div class="field">
                        <label class="" for="usr">NOMBRE DE PRODUCTO:</label>
                        <div class="control">
                            <input class="input" type="text" value="{{old('pro_nombre', $producto->pro_nombre)}}" name="pro_nombre"
                                id="pro_nombre">
                        </div>
                        @error('pro_nombre')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="" for="usr">STOCK:</label>
                        <div class="control">
                            <input class="input" type="number" value="{{old('pro_stock', $producto->pro_stock)}}" name="pro_stock"
                                id="pro_stock">
                        </div>
                        @error('pro_stock')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="" for="usr">PRECIO UNITARIO (en Bs):</label>
                        <div class="control">
                            <input class="input" type="text" value="{{old('pro_precio', $producto->pro_precio)}}" name="pro_precio"
                                id="pro_precio">
                        </div>
                        @error('pro_precio')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="" for="usr">UNIDAD:</label>
                        <div class="control">
                            <input class="input" type="text" value="{{old('pro_unidad', $producto->pro_unidad)}}" name="pro_unidad"
                                id="pro_unidad">
                        </div>
                        @error('pro_unidad')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="columns is-6">
                    <div class="field">
                        <label class="" for="usr">CATEGORIA:</label>
                        <div class="select is-expanded">
                            <select name="cat_id" id="cat_id">
                                <option>Seleccione una categoria</option>
                                @foreach($categorias as $categoria)
                                @if($categoria->cat_id == $producto->cat_id)
                                    <option selected value="{{$categoria->cat_id}}">{{$categoria->cat_nombre}}</option>
                                @else
                                    <option value="{{$categoria->cat_id}}">{{$categoria->cat_nombre}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        @error('cat_id')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="" for="usr">ESTADO PUBLICACION:</label>
                        <div class="select is-expanded">
                            <select name="pro_estado" id="pro_estado">
                                <option>Seleccione una opcion</option>
                                @if($producto->pro_estado == 0) 
                                    <option selected value="0">Guardado</option>
                                @else
                                    <option value="0">Guardado</option>
                                @endif
                                @if($producto->pro_estado == 1) 
                                    <option selected value="1">Publicado</option>
                                @else
                                    <option value="1">Publicado</option>
                                @endif
                            </select>
                        </div>
                        @error('pro_estado')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <p>FOTOGRAFIA DEL PRODUCTO</p>
                    <img class="thumbnail" src="{{asset($producto->pro_foto)}}">
                    <div class="file">
                        <label class="file-label">
                            <input class="file-input" type="file" name="pro_foto">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Seleccione un archivo…
                                </span>
                            </span>
                        </label>
                        @error('pro_foto')
                        <div class="notification is-danger">
                            <button class="delete"></button>
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="button is-primary">Guardar datos</button>
        </form>
    </div>
</div>
@endsection