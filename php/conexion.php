<?php
    $host="localhost";
    $user="root";
    $pass="root";

    $bd="php";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

?>
