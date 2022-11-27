<?php

include('conexion.php');//include conexion.php para poder usar $mysqli(conexion)

session_start();
if(!isset($_SESSION['logueado'])  || !$_SESSION['logueado']){
    header("Location: index.php");
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar contacto</title>
</head>
<body>
    <div>
    <h1>Eliminar Contacto</h1>
    
        <form action="deletear_contacto.php" method="post"><!--formulario que cuando el usuario introduce el nombre del contacto a borrar y pulsa en el boton borrar contacto, "actua en deletear:contacto.php", borrando el contacto:(ir alli para ver lo que hace esa pagina php) -->
        <input type="text" name="nombre" id="nombre" placeholder="nombre">
        
        <input type="submit" value="Borrar contacto">

        </form>
    </div>
    
</body>
</html>