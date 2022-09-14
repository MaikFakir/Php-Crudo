<?php

    include('conexion.php');

    $Usuario=$_POST['usuario'];
    $Contraseña=$_POST['contraseña'];
    session_start();
    $_SESSION['usuario']=$Usuario;
    $consulta = "SELECT*FROM usuarios WHERE correo ='$Usuario' AND contraseña ='$Contraseña' ";
    $resultado = mysqli_query($con,$consulta);

    $filas=mysqli_fetch_array($resultado);

    if($filas['verificado']=="si"){

        if($filas['roles_id']==1){//Administrador

            header("location:../dashboards/home.php");
    
        }elseif($filas['roles_id']==2){//Operador
    
            header("location:../dashboards/home2.php");
    
        }elseif($filas['roles_id']==3){//Cliente
    
            header("location:../dashboards/home3.php");
    
        }else{
            //echo '<script language="javascript">alert("Error de Autentificacion");</script>';
            //header("location:l?msg='Error de Autentificacion'");
            echo "<script> alert('Error de Autentificacion'); window.location= '../index.html' </script>";
            
        }

    }elseif($filas['verificado']=="no"){
        echo "<script> alert('Verifique su cuenta porfavor, Revise su Correo'); window.location= '../index.html' </script>";
    }else{
        echo "<script> alert('Error de Autentificacion'); window.location= '../index.html' </script>";
    }


    mysqli_free_result($resultado);
    mysqli_close($con);
//header("location:../home.php");
        //$consulta2 = "SELECT CONCAT(nombre, ' ', apellido) As Nombre From usuarios WHERE correo ='$Usuario' AND contraseña ='$Contraseña'";
        //$resultado2 = mysqli_query($con,$consulta2);
        //$array = mysqli_fetch_array($resultado2);
        //echo $array[0];
    ?>
    
        