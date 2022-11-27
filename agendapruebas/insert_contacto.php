<?php

include('conexion.php');//include conexion.php para poder usar $mysqli(conexion)


$nombre = $_POST['nombre'];//recoger en variables lo recibido del formulario de "crear contacto", que esta en nuestra pagina principal "logged-area"
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email =    $_POST['email'];

$sql = "INSERT INTO contactos VALUES('$nombre','$apellidos','$direccion','$telefono','$email')";//guardar en la variable $sql la sentencia para insertar un contacto, con los datos recibidos con el post del formu
$query = mysqli_query($mysqli, $sql);//guardar en $query el resultado de ejecutar la consulta (parametros 1-conexion a la bd, 2 la variable $sql donde esta la sentencia con al consulta)

if($query){//si se ha ejecutado la consulta, llevar al usuario a logged-area.php, donde podra ver si se ha hecho bien al estar mostrar esta pagina todo de todos los contactos
    header("Location: logged-area.php");
};

?>