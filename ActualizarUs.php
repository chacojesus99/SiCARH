<?php
    include "funcs/conexion.php";

            $iduser = $_POST['iduser'];
            $ap = $_POST['ap'];
            $am = $_POST['am'];
            $nombre = $_POST['nombre'];
            $usuario = $_POST['usuario'];
            $correo = $_POST['correo'];
            $area = $_POST['area'];
            $puesto = $_POST['puesto'];
            $rol = $_POST['rol'];
 
            $sql_update = mysqli_query($mysqli, "UPDATE usuario SET primer_apellido = '$ap', segundo_apellido = '$am', nombre = '$nombre', usuario = '$usuario', correo = '$correo', id_area = '$area', id_puesto = '$puesto' id_tipo = '$rol' where id= $idusuario");


    
    if(empty($_GET['id'])){
        header('location: Usuarios.php');
    }
    $iduser=$_GET['id'];
    $sql=mysqli_query($mysqli, "SELECT u.id, u.primer_apellido, u.segundo_apellido, u.nombre, u.usuario, u.correo, (u.id_area) as id_area, (ta.nombre_area) as nombre_area, (u.id_puesto) as id_puesto, (p.nombre_puesto) as nombre_puesto, (u.id_tipo) as id_tipo, (tu.tipo_de_usuario) as tipo_de_usuario
    FROM usuarios u 
    INNER JOIN tbl_area_adscripcion ta ON u.id_area = ta.id_area
    INNER JOIN puesto p ON u.id_puesto = p.id_puesto
    INNER JOIN tipos_usuarios tu ON u.id_tipo = tu.id_tipo
    WHERE id=$iduser");

    $result_sql = mysqli_num_rows($sql);

    if($result_sql == 0){
        header('location: Usuarios.php');
    }else{
        $option= '';
        $option2= '';
        $option3='';
        while($data = mysqli_fetch_array($sql)){
            $iduser = $data['id'];
            $ap = $data['primer_apellido'];
            $am = $data['segundo_apellido'];
            $nombre = $data['nombre'];
            $usuario = $data['usuario'];
            $correo = $data['correo'];
            $id_area = $data['id_area'];
            $nombre_area = $data['nombre_area'];
            $id_puesto = $data['id_puesto'];
            $nombre_puesto = $data['nombre_puesto'];
            $id_tipo = $data['id_tipo'];
            $tipo_de_usuario = $data['tipo_de_usuario'];
            
            if($id_area == 1){
                $option= '<option value="'.$id_area.'" select>'.$nombre_area.'</option>';
            }else if($id_area == 2){
                $option= '<option value="'.$id_area.'" select>'.$nombre_area.'</option>';
            }else if($id_area == 3){
                $option= '<option value="'.$id_area.'" select>'.$nombre_area.'</option>';
            }

            if($id_puesto == 3){
                $option2= '<option value="'.$id_puesto.'" select>'.$nombre_puesto.'</option>';
            }else if($id_puesto == 4){
                $option2= '<option value="'.$id_puesto.'" select>'.$nombre_puesto.'</option>';
            }

            if($id_tipo == 1){
                $option3= '<option value="'.$id_tipo.'" select>'.$tipo_de_usuario.'</option>';
            }else if($id_tipo == 2){
                $option3= '<option value="'.$id_tipo.'" select>'.$tipo_de_usuario.'</option>';
            }else if($id_tipo == 3){
                $option3= '<option value="'.$id_tipo.'" select>'.$tipo_de_usuario.'</option>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo_actualizar.css">
    <title>Modificación de tipo de usuario || SiCARH</title>
</head>
<body>
    <section id="titulo">
        <h1>ACTUALIZAR DATOS</h1>
    </section>
        <div class="form-register">
            <form action="" class="form-register" method="post">
            <div class="container--flex">
                <input type="hidden" name="iduser" value="<?php echo $iduser; ?>">
                <label for="" class="form__label">APELLIDO PATERNO</label>
                <input type="text" name="ap1" class="form__input" value="<?php echo $ap;?>">
            </div>
            <div class="container--flex">
                <label for="" class="form__label">APELLIDO MATERNO</label>
                <input type="text" name="am1" class="form__input" value="<?php echo $am;?>">
            </div>
            <div class="container--flex">
                <label class="form__label">NOMBRE(S)</label>
                <input type="text" name="nombre"class="form__input" value="<?php echo $nombre;?>">
            </div>
            <div class="container--flex">
                <label class="form__label">USUARIO</label>
                <input type="text" name="usuario"class="form__input" value="<?php echo $usuario;?>">
            </div>
            <div class="container--flex">
                <label class="form__label">CORREO</label>
                <input type="text" name="correo"class="form__input" value="<?php echo $correo;?>">
            </div>
            <div class="container--flex">
            <label for="" class="form__label">ÁREA:</label>
                <?php
                    $query_area = mysqli_query($mysqli,"SELECT * FROM tbl_area_adscripcion");
                    $resultado_area=mysqli_num_rows($query_area);
                ?>
                <select name="area" class="form__input" id="notItemOne">
                    <?php
                        echo $option;
                        if($resultado_area > 0){
                            while($area=mysqli_fetch_array($query_area)){
                ?>
                                <option value="<?php echo $area["id_area"]; ?>"><?php echo $area["nombre_area"] ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="container--flex">
            <label for="" class="form__label">PUESTO:</label>
                <?php
                    $query_puesto = mysqli_query($mysqli,"SELECT * FROM puesto");
                    $resultado_puesto=mysqli_num_rows($query_puesto);
                ?>
                <select name="puesto" class="form__input" id="notItemOne">
                    <?php
                        echo $option2;
                        if($resultado_puesto > 0){
                            while($puesto=mysqli_fetch_array($query_puesto)){
                ?>
                                <option value="<?php echo $puesto["id_puesto"]; ?>"><?php echo $puesto["nombre_puesto"] ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div id="Depe" class="container--flex">
                <label for="" class="form__label">TIPO DE USUARIO:</label>
                <?php
                    $query_rol = mysqli_query($mysqli,"SELECT * FROM tipos_usuarios");
                    $resultado_rol=mysqli_num_rows($query_rol);
                ?>
                <select name="rol" class="form__input" id="notItemOne">
                    <?php
                        echo $option3;
                        if($resultado_rol > 0){
                            while($rol=mysqli_fetch_array($query_rol)){
                ?>
                                <option value="<?php echo $rol["id_tipo"]; ?>"><?php echo $rol["tipo_de_usuario"] ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>
                <input type="submit" class="form__submit" value="Actualizar">
            <div class="c1">
                <a href="Usuarios.php" class="btn_cancelar">Cancelar</a>
            </div>
        </form>
        <script src="js/menu.js"></script>
        </div>
    
</body>
</html>