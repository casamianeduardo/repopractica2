<?php 
    session_start();//unirse a la sesion
    unset($_SESSION['logueado']);//terminar la sesion 'logueado'
    header("Location: index.php");//llevar al usuario al index donde debe meter usu+pass



?>