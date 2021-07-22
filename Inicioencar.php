<!DOCTYPE html>
<html lang="es">
    <head>
        <title>SiCARH || Encargado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/estilosinicio.css">
        <script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
        <script defer src="js/Icons.js"></script>
    </head>
    <body>
<!--------------------------------------------------Estructura barra de navegación----------------------------------------------------------------->
    <header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><i class="fas fa-bars"></i></label>
        <nav class="menu">
            <ul>
                <li><a href="PasesE.php"><i class="far fa-file-alt"></i> Solicitar pase</a></li>
                <li><a href="ControlpasesE.php"><i class="fas fa-id-card-alt"></i> Control de pases</a></li>
                <li class="submenu"><a href="#"><i class="far fa-user-circle"></i> Perfil <i id="span" class="fas fa-angle-down"></i></a>
                    <ul>
                        <li><a href="cuentaE.php" class="menu__link"><i class="fas fa-cogs"></i> Configuración de perfil</a></li>
                        <li><a href="HistorialSE.php" class="menu__link"><i class="far fa-folder-open"></i> Historial de pases</a></li>
                        <li><a href="logout.php" class="menu__link"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </header>
<!--------------------------------------------------Estructura formulario-------------------------------------------------------------------------->
<main>    
    <section id="Titulo">
        <h1> SISTEMA DE CONTROL DE ASISTENCIA DE RECURSOS HUMANOS </h1>
    </section>
        <div class="fondo">
            <img src="img/fond.png" class="img_fondo">
        </div>
    </main>
    <script src="js/menu.js"></script>
    </body>
    <footer>
        <div class="Pie">
            <img src="img/Pie.png" class="img_pie">
        </div>
    </footer>
</html>