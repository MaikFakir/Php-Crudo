<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "alumno";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(!$conn){
    die("No hay conexion:  ".mysql_connect_error());
}

$nombre = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$query = mysqli_query($conn,"SELECT * FROM alumno WHERE apellidos ='".$nombre."' and dni = '".$contraseña."'");
$nr = mysqli_num_rows($query);

if ($nr == 1) {

    echo "<h1>Bienvenid@ ".$nombre."</h1>\r";
    include 'crud.php';

}
else if ($nr == 0) {
    echo "No ingreso";
}

