<?php

include('conexion.php');//include conexion.php para poder usar $mysqli(conexion)




session_start();
if(!isset($_SESSION['logueado'])  || !$_SESSION['logueado']){//comprobacion de que existe la sesion, sino existe mandar al usuario al index,donde podra ingresar sus credenciaes
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar por nombre contacto</title>
</head>
<body>
    <div>
    <h1>Buscar Contacto</h1>
    
        <form action="" method="post"><!--formulario que envia la informacion recibida en el post a esta misma pagina -->
        <input type="text" name="busqueda" id="nombre" placeholder="nombre">
        
        <input type="submit" name="enviar" value="Buscar">

        </form>
    </div>
<?php
    if(isset($_POST['enviar'])){//codigo que comprueba si existe informacion recibida del formulario de esta misma pagina,enviada con el boton llamado enviar
        $busqueda = $_POST['busqueda'];//guardar en la variable $busqueda lo recibido en el formulario de arriba

        $sql = ("SELECT * FROM contactos WHERE nombre='$busqueda'");//guardar en la variable $sql la consulta que seleciona todo de los contactos donde el campo nombre es igual a lo recibido en el post y almacenado en $busqueda
        $query = mysqli_query($mysqli, $sql);//guardar en $query el resultado de ejecutar la consulta de arriba

        foreach ($query as $value ) {//bucle for each que mostrara por pantalla el array que guarda la informacion de la consulta, cada campo con el valor que almacena
            print_r($value);
        }
    }


?>
</body>
</html>