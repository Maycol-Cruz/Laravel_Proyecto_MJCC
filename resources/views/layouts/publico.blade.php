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
                src: url('..fonts/Exo-Regular.ttf');
            }
            html {
                height: 100%;
            }
            body {
                min-height: 100%;
            }
            body{
                background-image: url('/img/lapaz.jpg');
                background-position: center center;
                background-repeat:no-repeat;
                background-attachment:fixed;
                background-size:100%;
                font-family: "Exo";
            }
            .box-rounded{
                border-radius:7px;
            }
            .box-result{
              padding:7px;
              border:1px solid #ccc;
            }
            .box-container{
                background-color: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(3px);
                min-height: 700px;
            }
            footer{
                display: block;
                background-color: rgb(0,0,0);
                position: fixed;
                bottom: 0;
                left:0;
                right:0;
                text-align: center;
                color:#fff;
            }
            .logo-login{
                margin-bottom:30px;
            }
            .img-80{
              width:80%;
              margin:0 auto;
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
                <a class="navbar-item">
                  INICIO
                </a>
                <a class="navbar-item">
                  REGISTRARSE
                </a>
              </div>
          
              <div class="navbar-end">
                <div class="navbar-item">
                  <div class="buttons">
                    <a class="button is-primary">
                      <strong>INICIAR SESIÓN</strong>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </nav>        

        @yield('contenido')
        <footer>
            &copy; 2021 Laravel Bootcamp v1
        </footer>
    </body>
</html>
