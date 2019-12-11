<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>Epic Games Xperience</title>
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="public/css/papier.css" />
            <link rel="stylesheet" href="public/css/estilo.css" />
            <script src="public/js/jquery.min.js"></script>
            {{foreach css_ref}}
                <link rel="stylesheet" href="{{uri}}" />
            {{endfor css_ref}}
        </head>
        <body>
            <div class="menu">
                <div class="brand">Epic Games Xperience</div>
                <ul>
                    {{if notifnum}}
                    <li><a href="index.php?page=notificacion">
                      <span class="ion-android-notifications">&nbsp;{{notifnum}}</span></a>
                    </li>
                    {{endif notifnum}}
                    <li><a href="index.php?page=dashboard">Administración</a></li>
                    <li><a href="index.php?page=transacciones">Transferencias Recibidas</a></li>
                    <li><a href="index.php?page=mantenimiento_donaciones">Gestion de Productos</a></li>
                    <li><a href="index.php?page=logout">Cerrar Sesión</a></li>
                </ul>
                <div class="hbtn"> <div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div></div>
            </div>
            <div class="contenido">
                {{{page_content}}}
            </div>

            <div class="footer">
                Derechos Reservados 2019
            </div>
            {{foreach js_ref}}
                <script src="{{uri}}"></script>
            {{endfor js_ref}}
            <script>
              $().ready(function(e){
                $(".hbtn").click(function(e){
                  e.preventDefault();
                  e.stopPropagation();
                  $(".menu").toggleClass('open');
                  });
              });
            </script>
        </body>
    </html>
