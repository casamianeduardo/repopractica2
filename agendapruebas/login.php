<?php

require_once 'conexion.php';//require conexion.php para poder usar $mysqli(conexion)
session_start();//crear o unirse a sesion

$username = $_POST['username'];//lo que recibes del post, del formulario de index en el campo username, se guarda en variable $username
$password = $_POST['password'];//lo que recibes en el post, del formulario de index en el campo password, se guarda en variable $password

$sql = "SELECT * ";
$sql .="FROM credenciales ";
$sql .= "WHERE usuario = '". $username ."'";//consulta selecciona todo de credenciales donde usuario es igual $username


$resultados = $mysqli->query($sql);//guardar en la variable resultados , lo que nos da conectarse y ejecutar la consulta de arriba con query

$fila = mysqli_fetch_assoc($resultados);//guardar cada usu+pass en un array asociativo

$passwordHash = $fila['password'];//guardar en la variable $passwoorHash hash la contraseña hasheada de cada "fila"(usu+pass)

if(password_verify($password, $passwordHash)){//comprueba que la password recibida en el $_post es igual que la password hash:
    $_SESSION['logueado'] = true;
    header("Location: logged-area.php");//si es asi vas a la zona de estar logueado
}else{
    $_SESSION['logueado'] = false;
    header("Location: index.php");//si no es asi redirige al index ,donde debe ingresar el usu+pass el usuario
}


?>