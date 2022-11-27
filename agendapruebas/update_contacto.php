<?php

include('conexion.php');////include conexion.php para poder usar $mysqli(conexion)


session_start();//unirse a la sesion
if(!isset($_SESSION['logueado'])  || !$_SESSION['logueado']){//si no existe la sesion de logueado redirigir al index, donde el user ingresa usu+pass
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar contacto</title>
</head>
<body>
    <div>
    <h1>Editar Contacto</h1>
    
        <form action="edit_contacto.php" method="post"><!--en el form action indicamos donde queremos mandar la informacion de este formu, cuando el usuario pulse el boton -->
        <input type="text" name="nombre" id="nombre" placeholder="nombre">
        <input type="text" name="apellidos" id="apellidos" placeholder="apellidos">
        <input type="text" name="direccion" id="direccion" placeholder="direccion">
        <input type="text" name="telefono" id="telefono" placeholder="telefono">
        <input type="text" name="email" id="email" placeholder="email">

        <input type="submit" value="Actualizar contacto">

        </form>
    </div>
    
</body>
</html>