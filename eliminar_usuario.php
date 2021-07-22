<?php
    include "funcs/conexion.php";

    if(!empty($_POST)){
        $idusuario = $_POST['idusuario'];
        $query_delete = mysqli_query($mysqli, "DELETE FROM usuarios WHERE id = $idusuario");

        if($query_delete){
            header("location: Usuarios.php");
        }else{
            echo "Error al eliminar";
        }
    }

    if(empty($_REQUEST['id'])){
        header("location: Usuarios.php");
    }else {
        $idusuario = $_REQUEST['id'];
        $query = mysqli_query($mysqli,"SELECT u.id, u.primer_apellido, u.segundo_apellido, u.nombre, u.usuario, u.correo, ta.nombre_area, p.nombre_puesto, tu.tipo_de_usuario FROM usuarios u INNER JOIN tbl_area_adscripcion ta ON u.id_area = ta.id_area INNER JOIN puesto p ON u.id_puesto = p.id_puesto INNER JOIN tipos_usuarios tu ON u.id_tipo = tu.id_tipo where u.id = $idusuario");
        $result = mysqli_num_rows($query);
        if($result > 0){
            while($data = mysqli_fetch_array($query)){
                $iduser = $data['id'];
                $ap = $data['primer_apellido'];
                $am = $data['segundo_apellido'];
                $nombre = $data['nombre'];
                $usuario = $data['usuario'];
                $correo = $data['correo'];
                $area = $data['nombre_area'];
                $puesto = $data['nombre_puesto'];
                $rol = $data['tipo_de_usuario'];
            }
        }else{
                header:("location: Usuarios.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar registro</title>
</head>
<body>
    <section>
        <div>
            <h2> ¿Estás seguro de eliminar el siguiente registro?</h2>
            <p>Número de trabajador:<span><?php echo $iduser ?></span></p>
            <p>Apellido paterno: <span><?php echo $ap ?></span></p>
            <p>Apellido materno: <span><?php echo $am ?></span></p>
            <p>Nombre: <span><?php echo $nombre ?></span></p>
            <p>Usuario: <span><?php echo $usuario ?></span></p>
            <p>Correo: <span><?php echo $correo ?></span></p>
            <p>Área: <span><?php echo $area ?></span></p>
            <p>Puesto: <span><?php echo $puesto ?></span></p>
            <p>Tipo de usuario: <span><?php echo $rol ?></span></p>
            <form method="post" action="">
                <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                <a href="Usuarios.php">Cancelar</a>
                <input type="submit" value="Aceptar">
            </form>
        </div>
    </section>
    
</body>
</html>