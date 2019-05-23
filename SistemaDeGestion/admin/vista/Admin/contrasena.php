<?php

   # session_start();
    include '../../../config/conexionBD.php';
    $codigo=$_GET['codigo'];
    $contrasena_nueva=isset($_POST["nueva_contraseña"]) ? trim($_POST["nueva_contraseña"]):null;
    echo "<p> $codigo </p>";
    $sql="SELECT * FROM usuario WHERE usu_codigo='$codigo'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        echo "<p> Contrasena Cambiada </p>";
        date_default_timezone_set("America/Guayaquil");
        $modificacion=date('Y-m-d',time());
        $sqlCambiar="UPDATE usuario SET usu_password=MD5('$contrasena_nueva'), usu_fecha_modificacion='$modificacion' WHERE usu_codigo='$codigo'";
       $conn->query($sqlCambiar) ;
       header("Location:micuenta.php");
    }else{
        echo "<h2> La contrasena actual no coincide </h2>";
    #   header("Location: ../vista/login.html");
   }
   $conn->close();
?>