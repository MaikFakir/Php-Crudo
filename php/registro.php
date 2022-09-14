<?php
include("conexion.php");

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];
$rol='3';

$consulta = "SELECT * FROM usuarios WHERE correo='$correo'";
$resultado = mysqli_query($con,$consulta);

$correo_verificar=mysqli_num_rows($resultado);


if($correo_verificar==0){
    include "correo.php";
    $sql="INSERT INTO usuarios VALUES(NULL,'$nombre','$apellido','$correo','$contraseña','$rol','$codigo','no')";
    $query= mysqli_query($con,$sql);

        if($query){
            //echo "<script> alert('Registro exitoso'); window.location= '../index.html' </script>";
             echo "<script> alert('Registro exitoso, Revise su correo'); window.location= '../verificar_con.php?correo=$correo&codigo=$codigo' </script>";
            // echo "<script> alert('Registro exitoso, Revise su correo'); window.location= '../verificar_con.php?correo='.$correo'&codigo='.$codigo'' </script>";
            mysqli_close($con);
            
        }else {
            echo "<script> alert('Error de Registro'); window.location= '../registro.html' </script>";
            mysqli_close($con);
        }
        

    }else{
        echo "<script> alert('Error de Registro, Ya un usuario a registrado este correo');window.location= '../registro.html'  </script>";
        mysqli_close($con);
    }
?>

