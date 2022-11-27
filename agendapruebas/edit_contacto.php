<?php
include('conexion.php');//include conexion.php para poder usar $mysqli(conexion)

$nombre = $_POST['nombre'];//recogemos en el post cada campo que ha escrito el usuario en el formulario de update_contacto.php, cada uno en una variable
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email =    $_POST['email'];

$sql = "UPDATE contactos SET nombre='$nombre', apellidos='$apellidos', direccion='$direccion', telefono='$telefono', email='$email' WHERE nombre='$nombre'";//consulta donde actualizamos un contacto, con lo recibido en el post
$query = mysqli_query($mysqli, $sql);//guardar en $query el resultado de ejecutar la consulta almacenada en $sql en la bbdd

if($query){//si se ha realizado la $query correctamente redirigir al logged-area al usuario(alli podra ver si se ha actualizado , ya que tenemos una consulta que muestra todos los contactos alli)
    header("Location: logged-area.php");
};

?>