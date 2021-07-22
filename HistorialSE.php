<?php

require 'funcs/conexion.php';
require 'funcs/conecction.php';

session_start();
if(!isset($_SESSION["id_usuario"])){
        header("Location: index.php");
    }

    $idUsuario = $_SESSION['id_usuario'];


//SELECCIONAR DATOS DE DIFERENTES TABLAS
$query= "SELECT tbl_solicitud.num_solicitud, tbl_solicitud.fecha_aplicacion_pase, tbl_solicitud.hora_salida, tbl_solicitud.hora_llegada, tbl_solicitud.asunto, tbl_solicitud.dependencia,
tbl_tipo_pase.tipo, 
usuarios.primer_apellido, usuarios.segundo_apellido, usuarios.nombre, tbl_estado_pase.estado_pase 
FROM `tbl_solicitud` 
INNER JOIN tbl_tipo_pase ON tbl_solicitud.tipo_pase = tbl_tipo_pase.id_tipo_pase 
INNER JOIN usuarios ON tbl_solicitud.id_usuario_solicito = usuarios.id 
INNER JOIN tbl_estado_pase ON tbl_solicitud.estado = tbl_estado_pase.id_estado
WHERE usuarios.id='$idUsuario'";
        

$consulta=$mysqli->query($query);
$fila = $consulta->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewpor" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/estiloh.css?">
        <script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
        <script defer src="js/Icons.js"></script>
    </head>
    <body>
<!------------------------------------------------------------ESTRUCTURA DEL MENU------------------------------------------------------------------>
    <header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><i class="fas fa-bars"></i></label>
        <nav class="menu">
            <ul>
            <li><a href="Inicioencar.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="PasesE.php"><i class="far fa-file-alt"></i> Solicitar pase</a></li>
                <li><a href="ControlpasesE.php"><i class="fas fa-id-card-alt"></i> Control de pases</a></li>
                <li class="submenu"><a href="#"><i class="far fa-user-circle"></i> Perfil <i id="span" class="fas fa-angle-down"></i></a>
                    <ul>
                        <li><a href="cuentaE.php" class="menu__link"><i class="far fa-folder-open"></i> Configuración de perfil</a></li>
                        <li><a href="logout.php" class="menu__link"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </header>
        <!---------------------------------------ESTRUCTURA DE LA PÁGINA------------------------------------------------------------------>
        <section id="titulo">
            <h1>HISTORIAL DE PASES SOLICITADOS/h1>
        </section>
        <!---------------------------------------estructura de la tabla------------------------------------------------------------------>
        <div id="contenedor1"> 
        <table>
            <thead>
        <tr>
        <th>NUMERO DE SOLICITUD</th>
        <th>TIPO DE PASE</th>
        <th>USUARIO SOLICITANTE</th>
        <th>FECHA DE PARA SALIDA</th>
        <th>HORA DE SALIDA</th>
        <th>HORA LLEGADA</th>
        <th>ASUNTO</th>
        <th>DEPENDENCIA</th>
        <th>ESTADO DEL PASE</th>
        <th colspan="2">ACCIONES</th>
        </tr>
        </thead>
        <?php
        $query="SELECT tbl_solicitud.num_solicitud, tbl_solicitud.fecha_aplicacion_pase, tbl_solicitud.hora_salida, tbl_solicitud.hora_llegada, tbl_solicitud.asunto, tbl_solicitud.dependencia,
            tbl_tipo_pase.tipo, 
            usuarios.primer_apellido, usuarios.segundo_apellido, usuarios.nombre, tbl_estado_pase.estado_pase 
            FROM `tbl_solicitud` 
            INNER JOIN tbl_tipo_pase ON tbl_solicitud.tipo_pase = tbl_tipo_pase.id_tipo_pase 
            INNER JOIN usuarios ON tbl_solicitud.id_usuario_solicito = usuarios.id 
            INNER JOIN tbl_estado_pase ON tbl_solicitud.estado = tbl_estado_pase.id_estado
            WHERE usuarios.id=$idUsuario";
        $consulta=$conexion->query($query);
        while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    echo '
        <tr>
        <td>'.$fila['num_solicitud'].'</td>
        <td>'.$fila['tipo'].'</td>
		<td>'.$fila['nombre'].'</td>
		<td>'.$fila['fecha_aplicacion_pase'].'</td>
		<td>'.$fila['hora_salida'].'</td>
		<td>'.$fila['hora_llegada'].'</td>
		<td>'.$fila['asunto'].'</td>
        <td>'.$fila['dependencia'].'</td>
        <td>'.$fila['estado_pase'].'</td>

        ';
                }
        ?>
        
        <td>
        <a href="DeleteP.php?id=<?php echo $fila['ID']; ?>" class="btn_delete">Cancelar</a>
        </td>
        
        </tr>
                
        </table>
        </div>
        <script src="js/menu.js"></script>
    </body>
</html>