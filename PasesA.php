<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Recursos humanos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/EstiloPases.css?">
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
                        <li><a href="InicioAdmin.php"><i class="fas fa-home"></i> Inicio</a></li>
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
        <form action="funcs/InsertarP.php" class="form-register" method="post">
            <h1 class="form__title">PASE DE SALIDA</h1>
            <div class="container--flex">
                <label for="" class="form__label">Tipo de pase:</label>
                <select id="Pase" onchange="Tipopase()" class="form__input">
                    <option value="S">Seleccionar...</option>
                    <option value="P">Personal</option>
                    <option value="L">Laboral</option>
                    <option value="I">Al IMSS</option>
                </select>
            </div>
            <div class="container--flex">
                <label for="" class="form__label">Fecha de aplicación:</label>
                <input type="date" name="fa" class="form__input">
            </div>
            <div class="container--flex">
                <label for="" class="form__label">Hora de salida:</label>
                <input type="time" name="hs" class="form__input">
            </div>
            <div class="container--flex">
                <label for="" class="form__label">Asunto:</label>
                <input type="text" name="Asunto" class="form__input">
            </div>
            <div id="Depe" class="container--flex">
                <label class="form__label">dependencia:</label>
                <input type="text" name="Depe"class="form__input">
            </div>
                <input type="submit" class="form__submit" value="Solicitar">
        </form>
        <script src="js/menu.js"></script>
        <script src="js/Tipopase.js"></script> 
    </body>
</html>