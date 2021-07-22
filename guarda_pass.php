<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
    $user_id = $mysqli->real_escape_string($_POST['user_id']);
    $token = $mysqli->real_escape_string($_POST['token']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $con_password = $mysqli->real_escape_string($_POST['con_password']);

    if(validaPassword($password, $con_password))
    {
        $passhash = hashPassword($password);
        
        if(cambiaPassword($passhash, $user_id, $token))
        {
            echo "Password modificado";
            echo "<br> <a href='index.php' >Iniciar sesion</a>";
    
        }else{
            echo "Error al modificar el password";
        }
    }else{
        echo 'Las contraseñas no coinciden';
    }

?>	