<?php

session_start();

require 'funcs/conexion.php';
require 'funcs/funcs.php';

//Si el usuario no inica sesion es regresado a la autentifiacion
if(!isset($_SESSION["id_usuario"])){
    header("Location: index.php");
}

$idUsuario = $_SESSION['tipo_usuario'];

    $sql = "SELECT id, nombre FROM usuarios WHERE id = '$idUsuario'";
    $result = $mysqli->query($sql);

    $row = $result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>SiCARH || Administrador</title>
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
                <li><a href="PasesA.php"><i class="far fa-file-alt"></i> Solicitar pase</a></li>
                <li><a href="Usuarios.php"><i class="fas fa-users"></i> Control de usuarios</a></li>
                <li><a href="ControlpasesA.php"><i class="fas fa-id-card-alt"></i> Control de pases</a></li>
                <li class="submenu"><a href="#"><i class="far fa-user-circle"></i> Perfil <i id="span" class="fas fa-angle-down"></i></a>
                    <ul>
                        <li><a href="cuentaA.php" class="menu__link"><i class="fas fa-cogs"></i> Configuración de perfil</a></li>
                        <li><a href="HistorialSA.php" class="menu__link"><i class="far fa-folder-open"></i> Historial de pases</a></li>
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