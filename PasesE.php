<?php

require 'funcs/conexion.php';

    $query = "SELECT id_tipo_pase, tipo FROM  tbl_tipo_pase ORDER BY tipo ASC";
    $resultado = $mysqli->query($query);

    session_start();
    if(!isset($_SESSION["id_usuario"])){
    header("Location: index.php");
}
    $idUsuario = $_SESSION['tipo_usuario'];

    $sql = "SELECT id, nombre FROM usuarios WHERE id = '$idUsuario'";
    $result = $mysqli->query($sql);

    $row = $result->fetch_assoc();

    //Seleciona datos
    /*$query3= "SELECT id,  FROM usuarios WHERE id='$idUsuario'";
    $consulta=$mysqli->query($query3);
    $fila = $consulta->fetch_assoc();*/




?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Recursos humanos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/EstiloPases.css?">
        <link rel="stylesheet" href="css/fontello.css">
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
                        <li><a href="Inicioencar.php"><i class="fas fa-home"></i> Inicio</a></li>
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
        <form action="" class="form-register" method="post">
            <h1 class="form__title">PASE DE SALIDA</h1>
            <div class="container--flex">
                <label for="" class="form__label">Tipo de pase:</label>
                <select name="cbx_pase" id="cbx_pase" onchange="Tipopase()" class="form__input">
                <option value="0">Seleccionar Tipo De Pase</option>
                    <?php while($row = $resultado->fetch_assoc()) { ?>

                    <option value="<?php echo $row['id_tipo_pase']; ?>"><?php echo $row['tipo']; ?></option>

                    <?php } ?>
                </select>
            </div>
            <div class="container--flex">
                <label for="" class="form__label">Fecha de aplicación:</label>
                <input type="date" class="form__input">
            </div>
            <div class="container--flex">
                <label for="" class="form__label">Hora de salida:</label>
                <input type="time" class="form__input">
            </div>
            <div class="container--flex">
                <label for="" class="form__label">Asunto:</label>
                <input type="text" class="form__input">
            </div>
            <div id="Depe" class="container--flex">
                <label class="form__label">dependencia:</label>
                <input type="text" class="form__input">
            </div>
                <input type="submit" class="form__submit" value="Solicitar">
        </form>
        <script src="js/menu.js"></script>
        <script src="js/Tipopase.js"></script> 
    </body>
</html>