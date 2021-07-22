<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Control de pases || Encargado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/estilos_control.css">
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
                        <li><a href="PasesE.php"><i class="fas fa-users"></i> Solicitar pases</a></li>
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
<!--------------------------------------------------Estructura de la página-------------------------------------------------------------------------->
<section id="titulo">
            <h1>Control de pases</h1>
        </section>
        <div id="contenedor1"> 
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>TIPO DE PASE</th>
                        <th>FECHA DE SOLICITUD</th>
                        <th>HORA DE SALIDA</th>
                        <th colspan="2">ACCIONES</th>
                    </tr>
                </thead>
                <?php 
                    while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <td><?php echo $filas['ID']; ?></td>
                    <td></td>
                    <td><?php echo $filas['TipoPase']; ?></td>
                    <td><?php echo $filas['FechaS']; ?></td>
                    <td><?php echo $filas['HoraS']; ?></td>
                    <td>
                    <a href="DeleteP.php?id=<?php echo $fila['ID']; ?>" class="btn_delete">Rechazar</a>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </table>
        <?php
            mysqli_close($db);
        ?>
        </div>
        <script src="js/menu.js"></script>
    </body>
</html>