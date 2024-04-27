<?php 
include('conexion.php');

function sqlGeneros($con){
    $sql = "SELECT id_genero, nombre FROM genero;";
    $sqlGeneros = $con->query($sql);
    return $sqlGeneros;
}

function sqlPeliculas($con){
    $sql = "CALL peliculasList()";
    $sqlPeliculas = $con->query($sql);
    return $sqlPeliculas;
}