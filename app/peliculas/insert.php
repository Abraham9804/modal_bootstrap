<?php 
include('../config/conexion.php');

$nombre = isset($_POST['nombre']) ? htmlspecialchars(trim($_POST['nombre'])): '';
$descripcion = isset($_POST['descripcion']) ? htmlspecialchars(trim($_POST['descripcion'])): '';
$genero = isset($_POST['genero'])? $_POST['genero']: '';
$fecha = date("Y/m/d h:i:s");

$stmt = $con->prepare("INSERT INTO peliculas (nombre, descripcion, id_genero, fecha_alta) VALUES (?,?,?,?)");
$stmt->bind_param("ssis",$nombre, $descripcion, $genero, $fecha);
$stmt->execute();
if ($stmt->errno) {
    die('Error en la ejecución de la consulta: ' . $stmt->error);
}
if($stmt->affected_rows>0){
    echo json_encode(array('success'=>true,'message'=>'registro insertado'));
}else{
    echo json_encode(array('success'=>false,'message'=>'error en la insercion'));
}

header("location:index.php");