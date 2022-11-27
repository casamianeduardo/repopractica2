<?php
include('conexion.php');//include conexion.php para poder usar $mysqli(conexion)

$sql = "SELECT * FROM contactos";//seleciona todo de contactos
$query = mysqli_query($mysqli, $sql);//guardar en $query el resultado de ejecutar la consulta de arriba(conexion, consulta)como parametros

    session_start();//crear o unirse a la sesion
    if(!isset($_SESSION['logueado'])  || !$_SESSION['logueado']){//comprobacion de que hay cookie logueado, en caso de no encontrarla llevar al usuario al index, donde ingresa usu+pass
        header("Location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>Usuario logueado</p>


    <form action="logout.php" method="post"><!--formulario con boton que al pinchar en el boton, "actua en logout.php", ir ahi para ver lo que hace -->
    <input type="submit" value="Logout">
    </form>

    <form action="leerxml.php" method="post"><!--formulario con el que al pinchar en el boton "actua en leerxml.php, y lleva a ella, ir ahi para ver lo que hace  -->
    <input type="submit" value="Importar xml">
    </form>

    <form action="buscarcontacto.php" method="post"><!--formulario que al pinchar en el boton abre la pagina buscarcontacto.php donde el usuari puede buscar contactos por nombre -->
        <input type="submit" value="Buscar Por Nombre">
    </form>


    <?php
//Si se quiere subir una imagen
if (isset($_POST['subir'])) {
   //Recogemos el archivo enviado por el formulario
   $archivo = $_FILES['archivo']['name'];
   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivo) && $archivo != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['archivo']['type'];
      $tamano = $_FILES['archivo']['size'];
      $temp = $_FILES['archivo']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (!((strpos($tipo, "png") || strpos($tipo, "pdf") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 5242880))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .png, .jpg, .pdf. y de 5 mb  como máximo.</b></div>';
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, 'uploads/'.$archivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('uploads/'.$archivo, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //Mostramos la imagen subida
            echo '<p><img src="uploads/'.$archivo.'"></p>';
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
      }
   }
}
?>

    <form action="logged-area.php" method="POST" enctype="multipart/form-data"/>
    Añadir imagen: <input name="archivo" id="archivo" type="file"/>
    <input type="submit" name="subir" value="Subir imagen"/>
    </form><!--formulario con un boton para qe el usuario busque en su disco duro lo que quiere subir, y otro boton para enviarlo cuando lo haya seleccionado, "actua en esta misma pagina(hace lo descrito en el codigo php de justo arriba)" -->

    <div>

        <form action="insert_contacto.php" method="post"><!--Formulario que envia estos datos a "insert_contacto" con el post -->
            <h1>CREAR CONTACTO</h1>
            
            <input type="text" name="nombre" id="" placeholder="nombre">
            <input type="text" name="apellidos" id="" placeholder="apellidos">
            <input type="text" name="direccion" id="" placeholder="direccion">
            <input type="text" name="telefono" id="" placeholder="telefono">
            <input type="text" name="email" id="" placeholder="email">
            
            <input type="submit" value="Crear contacto">


        </form>
    </div>

    <div>
        <h2>Contactos registrados</h2>
        <table><!--Tabla que utilizaremos para mostrar en nuestra pagina principal, la consulta de mostrar todos los contactos, que hicimos arriba del todo guardada en $query -->
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

        <tbody>
             <?php while($row = mysqli_fetch_array($query)):  ?>     <!--bucle while para mostrar, cada campo($row) , de cada contacto($query) -->
            <tr>

            <th> <?= $row['nombre'] ?> </th>
            <th> <?= $row['apellidos'] ?> </th>
            <th> <?= $row['direccion'] ?> </th>
            <th> <?= $row['telefono'] ?> </th>
            <th> <?= $row['email'] ?> </th>
            

            <th><a href="update_contacto.php?nombre=<?= $row['nombre'] ?>">Editar</a></th><!--enlace que se creara con el bucle en cada contacto, que al pulsarlo el usuario "actua en update_contacto.php" y lleva al usuario a esa vista, (ir a update_contacto.php para ver lo que hacemos  alli) -->
            <th><a href="delete_contacto.php?nombre=<?= $row['nombre'] ?>">Eliminar</a></th><!--enlace que se creara con el bucle en cada contacto, que al pulsarlo el usuario "actua en delete_contacto.php" y lleva al usuario a esa vista, (ir a delete_contacto.php para ver lo que hacemos ali)-->
        </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
    </div>

    
</body>
</html>