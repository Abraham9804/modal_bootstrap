<?php 
include('../config/conexion.php');

$id = $con->real_escape_string($_POST['id']);

$sql = "SELECT id_pelicula, nombre, descripcion, id_genero, fecha_alta FROM peliculas WHERE id_pelicula = $id LIMIT 1";
$resultado = $con->query($sql);

$peliculas = [];
if($resultado->num_rows>0){
    $peliculas = $resultado->fetch_array();
    echo json_encode($peliculas, JSON_UNESCAPED_UNICODE);
}
