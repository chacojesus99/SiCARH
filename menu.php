<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maxumum-scale=1, minimum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="css/menu.css">
    <script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    <script defer src="js/Icons.js"></script>
</head>
<body>
    <header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><i class="fas fa-bars"></i></label>
        <nav class="menu">
            <ul>
                <li><a href="#"><i class="far fa-file-alt"></i> Solicitar pase</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Control de usuarios</a></li>
                <li><a href="#"><i class="fas fa-id-card-alt"></i> Control de pases</a></li>
                <li class="submenu"><a href="#"><i class="far fa-user-circle"></i> Perfil <i id="span" class="fas fa-angle-down"></i></a>
                    <ul>
                        <li><a href="" class="menu__link"><i class="fas fa-cogs"></i> Configuración de perfil</a></li>
                        <li><a href="" class="menu__link"><i class="far fa-folder-open"></i> Historial de pases</a></li>
                        <li><a href="" class="menu__link"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </header>
    <script src="js/menu.js"></script>
</body>
</html>