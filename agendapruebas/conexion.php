<?php

define("HOST_DB", "localhost");//definir con el host
define("USER_DB", "root");// con el usuario de db
define("PASS_DB", "");//al ser en xaamp esta vacia
define("NAME_DB", "agenda");//con el nombre de la bbdd


$mysqli = new mysqli(//guardar la coexion en la variable $mysqli. Para usar $mysqly("variable de conexion") en otros archivos, habra que hacer include de este conexion.php
    constant("HOST_DB"),//costante con el host
    constant("USER_DB"),//constante con el user db
    constant("PASS_DB"),//constante con la pass
    constant("NAME_DB")//constante con el nombre de la bbdd
)
?>