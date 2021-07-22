<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Sources/CSS/estilo_actualizar.css">
    <title>Modificación de tipo de usuario || SiCARH</title>
</head>
<body>
    <section id="conteiner">
        <div class="form-register">
            <form action="funcs/InsertarP.php" class="form-register" method="post">
            <div class="container--flex">
                
            </div>
            <div class="container--flex">
                <label for="" class="form__label">NÚMERO DE TRABAJADOR</label>
                <input type="date" name="fa" class="form__input">
            </div>
            <div class="container--flex">
                <label for="" class="form__label">APELLIDO PATERNO</label>
                <input type="time" name="hs" class="form__input">
            </div>
            <div class="container--flex">
                <label for="" class="form__label">APELLIDO MATERNO</label>
                <input type="text" name="Asunto" class="form__input">
            </div>
            <div class="container--flex">
                <label class="form__label">NOMBRE(S)</label>
                <input type="text" name="Depe"class="form__input">
            </div>
            <div class="container--flex">
                <label class="form__label">USUARIO</label>
                <input type="text" name="Depe"class="form__input">
            </div>
            <div class="container--flex">
                <label class="form__label">CORREO</label>
                <input type="text" name="Depe"class="form__input">
            </div>
            <div class="container--flex">
                <label class="form__label">ÁREA</label>
                <input type="text" name="Depe"class="form__input">
            </div>
            <div class="container--flex">
                <label class="form__label">PUESTO</label>
                <input type="text" name="Depe"class="form__input">
            </div>
            <div id="Depe" class="container--flex">
                <label for="" class="form__label">Tipo de usuario:</label>
                <select id="Pase" onchange="Tipopase()" class="form__input">
                    <option value="0">Seleccionar...</option>
                    <option value="1">Super administrador</option>
                    <option value="2">Encargado de area</option>
                    <option value="3">usuario</option>
                </select>
            </div>
                <input type="submit" class="form__submit" value="Actualizar">
            <div>
                <a href="Usuarios.php">Cancelar</a>
            </div>
        </form>
        <script src="js/menu.js"></script>
        </div>
    </section>
</body>
</html>