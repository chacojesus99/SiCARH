<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';

    $query = "SELECT id_area, nombre_area FROM  tbl_area_adscripcion ORDER BY nombre_area ASC";
    $resultado = $mysqli->query($query);

	$query2 = "SELECT id_puesto, nombre_puesto FROM  puesto ORDER BY nombre_puesto ASC";
    $resultado2 = $mysqli->query($query2);
	
	$errors = array();

    if(!empty($_POST))
    {
        $id = $mysqli->real_escape_string($_POST['id']);
		$primer_apellido = $mysqli->real_escape_string($_POST['primer_apellido']);
		$segundo_apellido = $mysqli->real_escape_string($_POST['segundo_apellido']);
        $nombre = $mysqli->real_escape_string($_POST['nombre']);
        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $password = $mysqli->real_escape_string($_POST['password']);
        $con_password = $mysqli->real_escape_string($_POST['con_password']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $id_area = $mysqli->real_escape_string($_POST['cbx_area']);
		$id_puesto = $mysqli->real_escape_string($_POST['cbx_puesto']);
          
        $activo = 0;
        $tipo_usuario = 3;
        $num_pases = 0;
        
        
        if(isNull($id, $primer_apellido, $segundo_apellido, $nombre, $usuario, $password, $con_password, $email, $id_area, $id_puesto))
        {
            $errors[] = "Debe llenar todos los campos";
        }

		if(NTrabajadorExiste($id)){
			$errors[] = "El numero de trabajador ya fue registrado";
		}
        
        if(usuarioExiste($usuario))
        {
            $errors[] = "El nombre de usuario $usuario ya existe";
        }

		if(emailExiste($email)){

			$errors[] = "El correo ya existe";
		}
        
        if(!isEmail($email))
        {
            $errors[] = "Direccion de correo invalida";
        }

        if(!validaPassword($password, $con_password))
        {
            $errors[] = "Las contraseñas no coinciden";
        }

		
        if(count($errors) == 0)
        {
            
                $pass_hash = hashPassword($password);
				$token = generateToken();

                
                $registro = registraUsuario($id, $primer_apellido, $segundo_apellido, $nombre, $usuario, $pass_hash, $email, $id_area, $id_puesto, $activo, $token, $tipo_usuario, $num_pases);
				
				if($registro = 1)
                {

                    $url = 'http://'.$_SERVER["SERVER_NAME"].'/nuevoproyecto/activar.php?id='.$id.'&val='.$token;
                    $asunto = 'Activar Cuenta - Sistema de Usuarios';
                    $cuerpo = "Estimado $nombre: <br /><br />Para continuar con el proceso de registro, es indispensable de click en la siguiente liga <a href='$url'>Activar Cuenta</a>";
                    
                    if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
                        
                        echo "Para terminar el proceso de registro siga las instrucciones que le hemos enviado la direccion de correo electronico: $email";
                        
                        echo "<br><a href='index.php' >Iniciar Sesion</a>";
                        exit;
                        
                    }else{
                       $errors[] = "Error al enviar Email"; 
                    }
                    
                }else{
                    $errors[] = "Error al Registrar";
                }
            
        }
		
    }
?>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registro</title>
		<link rel="stylesheet" href="css/estiloimg.css" >
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	
	<body>
	<header>
		<img src="img/banner.png" alt="">
	</header>
		<div class="container">
			<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Reg&iacute;strate</div>
						<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="index.php">Iniciar Sesi&oacute;n</a></div>
					</div>  
					
					<div class="panel-body" >
						
						<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							<div class="form-group">
								<label for="num_trabajador" class="col-md-3 control-label">Numero de trabajador:</label>
								<div class="col-md-9">
									<input type="number" class="form-control" name="id" placeholder="Numero de trabajador" value="<?php if(isset($id)) echo $id; ?>" required >
								</div>
							</div>

							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Primer Apellido:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="primer_apellido" placeholder="Primer Apellido" value="<?php if(isset($primer_apellido)) echo $primer_apellido; ?>" required >
								</div>
							</div>

							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Segundo Apellido:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="segundo_apellido" placeholder="Segundo Apellido" value="<?php if(isset($segundo_apellido)) echo $segundo_apellido; ?>" required >
								</div>
							</div>

							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Nombre:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
								</div>
							</div>
			
							
							<div class="form-group">
								<label for="usuario" class="col-md-3 control-label">Usuario</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Password" min="8" maxlength="10" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="email" class="col-md-3 control-label">Email</label>
								<div class="col-md-9">
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
								</div>
							</div>
							
				           
                            <div>Selecciona Departamento: <select  name="cbx_area" id="cbx_area">
                                <option value="0">Seleccionar Departamento</option>
                                <?php while($row = $resultado->fetch_assoc()) { ?>

                                    <option value="<?php echo $row['id_area']; ?>"><?php echo $row['nombre_area']; ?></option>

                                <?php } ?>
                            </select>
                            </div>

							<br>

							<div>Selecciona Puesto: <select  name="cbx_puesto" id="cbx_puesto">
                                <option value="0">Seleccionar Puesto</option>
                                <?php while($row = $resultado2->fetch_assoc()) { ?>

                                    <option value="<?php echo $row['id_puesto']; ?>"><?php echo $row['nombre_puesto']; ?></option>

                                <?php } ?>
                            </select>
                            </div>

							<br>
                        
							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button> 
								</div>
							</div>
						</form>
						<?php echo resultBlock($errors); ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>															