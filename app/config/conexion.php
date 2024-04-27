<?php 

$con = new mysqli("localhost","root","12qwaszx","cinema");

if($con->connect_error){
    die('error en la conexion').$con->connect_error;
}