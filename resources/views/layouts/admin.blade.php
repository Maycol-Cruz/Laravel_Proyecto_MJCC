<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>
        <link rel="stylesheet" href="/css/app.css">
        <style>
            @font-face {
                font-family:"Exo";
                src: url('../fonts/Exo-Regular.ttf');
            }
            body{
                font-family: "Exo";
            }
            .image img{
                margin:20px auto 5px auto;
                width:70%;
            }
            .titulo-contenido{
                margin-top:20px;
                padding-bottom:7px;
                border-bottom:2px solid #777;                
                color: #f00
            }
            table {
              margin:0 auto;
              width: 90%;
            }            
            .has-background-plomito{
              background-color:#dedede;
            }
            .btn-float-right{
              float:right;
            }
            .thumbnail{
              width:200px;
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
                <a href="{{url('/')}}" class="navbar-item">
                  INICIO
                </a>
                <a href="{{url('/categorias')}}" class="navbar-item">
                  CATEGORIAS
                </a>
                <a href="{{url('/productos')}}" class="navbar-item">
                  PRODUCTOS
                </a>
                <a href="{{url('/ordenes')}}" class="navbar-item">
                  ORDENES
                </a>
                <a href="{{url('usuarios')}}" class="navbar-item">
                  USUARIOS
                </a>
              </div>
          
              <div class="navbar-end">
                <div class="navbar-item">
                  <div class="buttons">
                    <a class="button is-primary">
                      <strong>Ver carrito</strong>
                    </a>
                    {{-- <a class="button is-light">
                      Cerrar sesión
                    </a> --}}
                  </div>
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
                    <p class="menu-label">
                      OPCIONES 
                    </p>
                    <ul class="menu-list">
                      <li><a>Opcion1</a></li>
                      <li><a>Opcion2</a></li>
                    </ul>
                    <p class="menu-label">
                      CUENTA DE USUARIO
                    </p>
                    <ul class="menu-list">
                      <li><a>Ver perfil</a></li>
                      <li><a>Cambiar contraseña</a></li>
                      <li><a>Cerrar sesion</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column is-9">
                @yield('contenido2')
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>        
        <script type="text/javascript">
          $(document).ready(function(){
              $('.modal-button').click(function (e) { 
                  $('#dialogo').addClass('is-active');
                  $('#item_nombre').html($(this).parent('td').siblings('.td-nombre').html()) ;
                  let id = $(this).parent('td').siblings('.td-id').html();
                  let ruta_recurso = $('#form_delete').attr('action');
                  $('#form_delete').attr('action', ruta_recurso+id) ;
              });
              $('.cerrar-dialogo').click(function (e) { 
                  $('#dialogo').removeClass('is-active');
              });
          });
        </script>
      </body>
</html>
