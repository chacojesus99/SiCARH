<?php
    include "funcs/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewpor" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="CSS/estilou.css">
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
                        <li><a href="InicioAdmin.php"><i class="fas fa-home"></i> Inicio</a></li>
                        <li><a href="PasesA.php"><i class="fas fa-users"></i> Solicitar pases</a></li>
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
        <!---------------------------------------ESTRUCTURA DE LA PÁGINA------------------------------------------------------------------>
        <section id="titulo">
            <h1><i class="fas fa-users"></i> CONTROL DE USUARIOS</h1>
        </section>   
        <!---------------------------------------------- ESTRUCTURA DE LA TABLA--------------------------------------->
        <div id="contenedor1"> 
            <table>
                <thead>
                    <tr>
                        <th>NÚMERO DE TRABAJADOR</th>
                        <th>APELLIDO PATERNO</th>
                        <th>APELLIDO MATERNO</th>
                        <th>NOMBRE(S)</th>
                        <th>USUARIO</th>
                        <th>CORREO</th>
                        <th>ÁREA</th>
                        <th>PUESTO</th>
                        <th>TIPO DE USUARIO</th>
                        <th colspan="2">ACCIONES</th>
                    </tr>
                    <?php
                        $query = mysqli_query($mysqli, "SELECT u.id, u.primer_apellido, u.segundo_apellido, u.nombre, u.usuario, u.correo, ta.nombre_area, p.nombre_puesto, tu.tipo_de_usuario FROM usuarios u INNER JOIN tbl_area_adscripcion ta ON u.id_area = ta.id_area INNER JOIN puesto p ON u.id_puesto = p.id_puesto INNER JOIN tipos_usuarios tu ON u.id_tipo = tu.id_tipo");

                        $result = mysqli_num_rows($query);
                        if($result > 0){
                            while ($date = mysqli_fetch_array($query)){
                    ?>
                </thead>
                    <tr>
                        <td><?php echo $date["id"] ?></td>
                        <td><?php echo $date["primer_apellido"] ?></td>
                        <td><?php echo $date["segundo_apellido"] ?></td>
                        <td><?php echo $date["nombre"] ?></td>
                        <td><?php echo $date["usuario"] ?></td>
                        <td><?php echo $date["correo"] ?></td>
                        <td><?php echo $date["nombre_area"] ?></td>
                        <td><?php echo $date["nombre_puesto"] ?></td>
                        <td><?php echo $date["tipo_de_usuario"] ?></td>
                        <td><a href="ActualizarUs.php?id=<?php echo $date["id"]; ?>" class="btn_update"><i class="far fa-edit"></i>Actualizar</a></td>
                        <td><a href="eliminar_usuario.php?id=<?php echo $date["id"]; ?>" class="btn_delete"><i class="far fa-trash-alt"></i>Eliminar</a></td>
                    </tr>
                <?php
                                        }
                                    }
                ?>
            </table>
        </div>
        <script src="js/menu.js"></script>
    </body>
</html>