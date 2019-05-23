<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] ===FALSE){
        #echo "<script> alert ('No tiene permisos para ingresar');</script>";
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
    
    if ($_SESSION['nickname'])
            {
                        $grabado=$_SESSION['nickname']; //Si existe un nickname generamos el mensaje
            }
            
            else
            {
	                    $grabado="<h1>No se Guardo<h1>"; //Mensaje que no existe nada Grabado
            }
      if ($_SESSION['codigo'])
            {
                        $codigo=$_SESSION['codigo']; //Si existe un nickname generamos el mensaje
            }
            
    else
            {
	                    $codigo="<h1>No se Guardo<h1>"; //Mensaje que no existe nada Grabado
            }

        include "../../../config/conexionBD.php";

        $correo=isset($_POST["correo"]) ? trim($_POST["correo"]):null;
        $asunto=isset($_POST["asunto"]) ? mb_strtoupper(trim($_POST["asunto"]),"UTF-8"):null;
        $mensaje=isset($_POST["mensaje"]) ? mb_strtoupper(trim($_POST["mensaje"]),"UTF-8"):null;
       


        $sql="INSERT INTO mensajeria VALUES(0,'$correo','$grabado','$asunto',NULL,'$mensaje','$codigo')";

        echo "<a>$sql</a>"; 
        
        if($conn->query($sql)===TRUE){
            echo "<p> Se ha creado los datos personales correctamente </p>";
            header("Location:MensajesEnviados.php"); 
        }else{
            
            if($conn->errno ==1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistemas </p>";
                
            }else{
                echo"<p class='error' Error: ".mysql_error($conn). "</p>";
            }
        }

        $conn->close();
        echo "<a href='MensajesEnviados.php'>Revisar</a> "

    ?>
