<?php
include('conexion.php');//include de conexion.php para poder usar la variable "de conexion" $mysqli

$nombre = $_POST['nombre'];//almacena en $nombre lo recibido del formulario de delete_contacto.php


$sql = "DELETE FROM contactos WHERE nombre ='$nombre'";//guarda en la variable sql la consulta que , borra de contactos donde el nombre sea = a lo recibido del post y almacenado en la variable $nombre
$query = mysqli_query($mysqli, $sql);//guardar en $query el resultado de ejecutar la consulta de arriba. mysqli_query(parametro 1 conexiona bdd, parametro 2 consulta almacenada en $sql)

if($query){//si se realiza la consulta devolver al usuario a logged-area.php donde podra comprobar si se ha realizado, al mostrarse en esa pagina todo le rato, la consulta de mostrar todo de todos los contactos
    header("Location: logged-area.php");
};

?>