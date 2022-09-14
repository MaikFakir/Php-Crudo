<?php
    include "conexion.php";
    $correo =$_POST['correo'];
    $codigo =$_POST['codigo'];

    $revision = $con->query("SELECT*FROM usuarios WHERE correo = '$correo' AND codigo = '$codigo' AND verificado = 'si'")or die("$con->error");
    if(mysqli_num_rows($revision)==1){
        echo "<script> alert('Esta Cuenta ya ha sido Verificada'); window.location= '../index.html' </script>";
    }else{
        $resultado = $con->query("SELECT*FROM usuarios WHERE correo = '$correo' AND codigo = '$codigo'") or die("$con->error");
            if(mysqli_num_rows($resultado)==1){
                echo "<script> alert('Cuenta Verificada'); window.location= '../index.html' </script>";
                $con->query("UPDATE usuarios SET verificado = 'si' WHERE correo = '$correo' AND  codigo = '$codigo'");
            }else{
                echo"Codigo Invalido";
            }
    }
    