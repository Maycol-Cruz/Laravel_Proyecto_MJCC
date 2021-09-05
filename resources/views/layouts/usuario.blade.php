<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
    @font-face {
        font-family: "Exo";
        src: url('../fonts/Exo-Regular.ttf');
    }

    body {
        font-family: "Exo";
    }

    .image img {
        margin: 20px auto 5px auto;
        width: 70%;
    }

    .titulo-contenido {
        margin-top: 20px;
        padding-bottom: 7px;
        border-bottom: 2px solid #777;
        color: #f00
    }

    table {
        margin: 0 auto;
        width: 90%;
    }

    .has-background-plomito {
        background-color: #dedede;
    }

    .box-rounded {
        border-radius: 7px;
    }

    .box-result {
        border: 1px solid #ccc;
        padding: 7px;
    }
    </style>
</head>

<body>

    <nav class="navbar is-black" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <img src="/img/laravel-bootcamp.png">
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                @auth
                @if($usuario->use_rol == '2')
                <a class="navbar-item" href="{{url('/panel_usuario')}}">
                    INICIO
                </a>

                <a class="navbar-item" href="{{url('ordenes/compras')}}">
                    COMPRAS
                </a>
                <a class="navbar-item" href="{{url('ordenes')}}">
                    ORDENES
                </a>
                <a class="navbar-item" href="{{url('/metodos')}}">
                    METODOS DE PAGO
                </a>
                @endauth
                @endif
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    @auth
                    <div class="buttons">
                        <a class="button is-primary" href="{{url('ordenes/carrito')}}">
                            <strong>Ver carrito</strong>
                        </a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="columns">
        <div class="column is-3 has-background-plomito">
            <figure class="image">
                <img class="is-rounded" src="/img/default.jpg">
            </figure>
            <aside class="menu" style="margin:7px;">
                <div class="has-text-centered content">
                    <h4>
                        {{Str::upper($usuario->usu_nombres)}} {{Str::upper($usuario->usu_apellidos)}}
                        <br>
                        <small>#{{$usuario->usu_username}}</small>
                    </h4>
                </div>
                <p class="menu-label">
                    CUENTA DE USUARIO
                </p>
                <ul class="menu-list">
                    <li><a href="{{url('/usuarios/'.$usuario->usu_id.'/editar')}}">Editar perfil</a></li>
                    <li><a href="{{url('/usuarios/'.$usuario->usu_id.'/editar_password')}}">Cambiar contraseña</a></li>
                    <li><a href="{{url('/logout')}}">Cerrar sesion</a></li>
                </ul>
            </aside>
        </div>
        <div class="column is-9">
            @yield('contenido2')
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {});
    </script>
</body>

</html>