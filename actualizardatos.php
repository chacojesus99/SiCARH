<?php

require 'funcs/conexion.php';

$query = "SELECT id_area, nombre_area FROM tbl_area_adscripcion ORDER BY nombre_area ASC";
    $resultado = $mysqli->query($query);

session_start();
if(!isset($_SESSION["id_usuario"])){
        header("Location: index.php");
    }

    $idUsuario = $_SESSION['id_usuario'];

$query = "SELECT usuarios.primer_apellido, usuarios.segundo_apellido, usuarios.nombre, usuarios.usuario, usuarios.correo, 
tbl_area_adscripcion.nombre_area
FROM `usuarios`
INNER JOIN tbl_area_adscripcion ON usuarios.id = tbl_area_adscripcion.id_area
WHERE usuarios.id='$idUsuario'";
        

$consulta=$mysqli->query($query);
$fila = $consulta->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Datos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                </div>

                <div class="panel-body">

                    <form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>

                        <div class="form-group">
                            <label for="nombre" class="col-md-3 control-label">PRIMER APELLIDO:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="num_trabajador" value="<?php echo $fila["primer_apellido"] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nombre" class="col-md-3 control-label">SEGUNDO APELLIDO:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nombre" value="<?php echo $fila["segundo_apellido"] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apellidos" class="col-md-3 control-label">NOMBRE:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="apellidos" value="<?php echo $fila["nombre"] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="usuario" class="col-md-3 control-label">USUARIO</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="usuario" value="<?php echo $fila["usuario"] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">CORREO</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email" value="<?php echo $fila["correo"] ?>">
                            </div>
                        </div>

                        <input type="hidden" name="ID" value="<?php echo $idUsuario;?>">
                        <a href="Inicio.php">Cancelar</a>
                        <button type="submit" class="btn btn-info" name="editar">Actualizar</button>
                    </form>
                    <?php
                    if (isset($_POST["editar"])){
                        $primer_apellido = $_POST["primer_apellido"];
                        $segundo_apellido = $_POST["segundo_apellido"];
                        $nombre = $_POST["nombre"];
                        $usuario = $_POST["usuario"];
                        $correo = $_POST["email"];

                        $id = $_POST["ID"];
                        
                        
                         $sqlmodificar="UPDATE usuarios as Usu INNER JOIN departamentos as Dep ON (Usu.id_departamento = Dep.id_departamento)
                        SET
                            Usu.num_trabajador = '$num_trabajador',
                            Usu.nombre = '$nombre',
                            Usu.apellidos = '$apellidos',
                            Usu.fecha_nacimiento = '$fecha_nacimiento',
                            Usu.usuario = '$usuario',
                            Usu.correo = '$correo',
                            Usu.telefono = '$telefono'
                            WHERE Usu.id = '$id'";
                        
                        $modificado = $mysqli->query($sqlmodificar);
                           if($modificado > 0){
                               echo"<script>alert('Registro modificado exitosamente'); window.location='Cuenta.php';</script>";
                           }else{
                               echo"<script>alert('Error al modificar'); window.location='actualizar_datos.php';</script>";
                           }
                        
                       
                    }
                    $mysqli->close(); 
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>