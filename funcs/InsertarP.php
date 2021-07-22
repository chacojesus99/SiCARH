<?php
include 'conexion.php';
date_default_timezone_set("America/Mexico_city");


//Recibir los datos y almacenarlos en una variable
$tipo_pase = $_POST["cbx_pase"];
$id = $_POST["num_trabajador"];
$fecha_aplicacion= $_POST["fecha_aplicacion"];
$hora_salida = $_POST["hora_salida"];
$hora_llegada = $_POST["hora_llegada"];
$asunto = $_POST["asunto"];
$dependencia = $_POST["dependencia"];

$estado=4;
/*$fech_soli = date("d-m-Y");
$hora_soli = date("h:i:s A");*/

//Consultar para insertar
$insertar = "INSERT INTO tbl_solicitud(tipo_pase, id_usuario_solicito, fecha_aplicacion_pase, hora_salida, hora_llegada, asunto, dependencia, estado) 
VALUES ('$tipo_pase', '$id', '$fecha_aplicacion', '$hora_salida', '$hora_llegada' '$asunto','$dependencia', '$estado')";

//Ejecutar consulta
$resultado = mysqli_query($mysqli, $insertar);
if(!$resultado) {
    echo "se produjo un error";
}else{
    echo "Se solicitado correctamenta";
}

//Cerrar conexión
mysqli_close($mysqli);
