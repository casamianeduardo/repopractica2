<?php

require "conexion.php";//include conexion.php para poder usar $mysqli(conexion)

session_start();
if(!isset($_SESSION['logueado'])  || !$_SESSION['logueado']){//comprobacion de que el usuario tiene la sesion "logueado", sino lo mandas al index donde puede poner las credenciales
    header("Location: index.php");
}

//ruta del xml
$archivo = simplexml_load_file("bd\agenda.xml");//guardar en la variable lo que extrae simplexml_loadfile del archivo xml

//borrar la tabla contactos en caso que exista
//(estas 2 lineas de codigo suguientes, deberian ser comentados despues de insertar el xml por primera vez, sino, esto se ejecutara y borrara la tabla contactos cada vez qe un usuario pulse el boton de leerxml,borrando asi todos los contactos que no provengan del xml )
$sql_delete = "DROP TABLE IF EXISTS contactos";
$mysqli->query($sql_delete);//conectarse->ejecutar($varible con la consulta)

//crear la tabla contactos

$sql = "CREATE TABLE contactos(nombre varchar(50) UNIQUE KEY,apellidos varchar(50),direccion varchar(50), telefono varchar(50), email varchar(50))";//sentencia de crear la tabla contactos con campo UNIQUE nombre

if($mysqli->query($sql) === TRUE){//if ($conexion->ejecutar($variable con consulta) === true) (si la tabla se crea)
    echo "la tabla contactos se creo correctamente con los siguientes datos : <br>" ;
}else{//si es false (si no se crea)
    echo "Hubo un error al crear la tabla: " . $mysqli->error . "<br> <br>";//muestra el error por pantalla
}

//ciclo para leer xml e insertar en la tabla
foreach ($archivo as $contacto){
    echo "Nombre : " .$contacto->nombre . "<br>";
    echo "Apellidos : " .$contacto->apellidos . "<br>";
    echo "Direccion : " .$contacto->direccion . "<br>";
    echo "Telefono : " .$contacto->telefono . "<br>";
    echo "Email : " .$contacto->email . "<br>";


    //insertar los datos 

    $sql_insert = "INSERT INTO contactos VALUES('$contacto->nombre','$contacto->apellidos','$contacto->direccion','$contacto->telefono','$contacto->email')";//guardar en la variable $sql_insert una sentencia insertando lo recodigo del xml cone l bucle

    if($mysqli->query($sql_insert) === TRUE){//si ($conexion->ejecutar($variable con consulta) === true) (si los datos del xml se insertan en la BBDD)
        echo "Se inserto la informacion del XML <br>";
    }else{//si es false (si no se insertan los datos)
        echo "Hubo un error al insertar en la tabla: " . $mysqli->error . "<br>";
    }

}

$mysqli->close();//cerrar conexion





    
   
    
?>