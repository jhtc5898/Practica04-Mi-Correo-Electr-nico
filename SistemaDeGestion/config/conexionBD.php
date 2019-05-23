<?php
    $db_servername="localhost";
    $db_username="root";
    $db_password="root";
    $db_name="hipermedial";
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);;
    $conn->set_charset("utf8");

    #probar la conexion  
    if($conn->connect_error){
        die("Conexion fallida: ".$conn->connect_error);
    }else{
        #echo"<h1> Conexion exitosa </h1>";
    }
?>