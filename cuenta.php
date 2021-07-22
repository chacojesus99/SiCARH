<?php

require 'funcs/conexion.php';

session_start();
if(!isset($_SESSION["id_usuario"])){
        header("Location: index.php");
    }

    $idUsuario = $_SESSION['id_usuario'];


//Seleccion de datos de diferentes tablas
$query= "SELECT Usu.id, Usu.primer_apellido, Usu.segundo_apellido, Usu.nombre, Usu.usuario, Usu.correo, Usu.num_pases,
        Area.id_area, Area.nombre_area,
        Pu.id_puesto, Pu.nombre_puesto
        
        FROM usuarios Usu
        INNER JOIN tbl_area_adscripcion Area ON Usu.id_area = Area.id_area
        INNER JOIN puesto Pu ON Usu.id_puesto = Pu.id_puesto
        WHERE Usu.id='$idUsuario'";

$consulta=$mysqli->query($query);
$fila = $consulta->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>SiCARH || Cuenta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilo_cuenta.css?">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script defer src="js/Icons.js"></script>
    </head>
    <body>
<!--------------------------------------------------Estructura barra de navegación----------------------------------------------------------------->
<header>
        <h2><?php echo 'Bienvenido(a) '.($fila['nombre']); ?></h2>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><i class="fas fa-bars"></i></label>
        <nav class="menu">
            <ul>
            <li><a href="Iniciousu.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="Pases.php"><i class="far fa-file-alt"></i> Solicitar pase</a></li>
                <li class="submenu"><a href="#"><i class="far fa-user-circle"></i> Perfil <i id="span" class="fas fa-angle-down"></i></a>
                    <ul>
                        <li><a href="HistorialS.php" class="menu__link"><i class="far fa-folder-open"></i> Historial de pases</a></li>
                        <li><a href="logout.php" class="menu__link"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </header>
<!--------------------------------------------------Estructura formulario-------------------------------------------------------------------------->
        <script src="js/menu.js"></script>
        <section id="titulo">
            <h1><i class="fas fa-tools"></i> Configuración de perfil</h1>
        </section>
        

        <div id="contenedor1"> 
            <table>
                    <tr>
                        <th class="thead">NÚMERO DE TRABAJADOR</th><td class="tr"><?php echo $fila["id"] ?></td>
                    </tr>
                    <tr>
                        <th class="thead">APELLIDO PATERNO</th><td class="tr"><?php echo $fila["primer_apellido"] ?></td>
                    </tr>
                    <tr>
                        <th class="thead">APELLIDO MATERNO</th><td class="tr"><?php echo $fila["segundo_apellido"] ?></td>
                    </tr>
                    <tr>
                        <th class="thead">NOMBRE(S)</th><td class="tr"><?php echo $fila["nombre"] ?></td>
                    </tr>
                    <tr>
                        <th class="thead">USUARIO</th><td class="tr"><?php echo $fila["usuario"] ?></td>
                    </tr>
                    <tr>
                        <th class="thead">CORREO</th><td class="tr"><?php echo $fila["correo"] ?></td>
                    </tr>
                    <tr>
                        <th class="thead">ÁREA</th><td class="tr"><?php echo $fila["nombre_area"] ?></td>
                    </tr>
                    <tr>
                        <th class="thead">PUESTO</th><td class="tr"><?php echo $fila["nombre_puesto"] ?></td>
                    </tr>
                    <tr>
                        <th class="thead">NUMERO DE PASES</th><td class="tr"><?php echo $fila["num_pases"] ?></td>
                    </tr>
            </table>
        </div>
        <div class="Contenedor2">
            <a href="actualizardatos.php" class="btn_Modi">Modificar</a>
        </div>
    </body>
</html>