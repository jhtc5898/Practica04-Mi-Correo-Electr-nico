<?php

    session_start();
    include '../../config/conexionBD.php';

    $usuario=isset($_POST["correo"]) ? trim($_POST["correo"]):null;
    $contrasena=isset($_POST["contraseña"]) ? trim($_POST["contraseña"]):null;
    $_SESSION['nickname']=isset($_POST["correo"]) ? trim($_POST["correo"]):null;

 
    $sql="SELECT * FROM usuario WHERE usu_correo='$usuario' and usu_password=MD5('$contrasena')";
 
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
    
        $_SESSION['isLogged']=TRUE;
        while($row=$result->fetch_assoc()){
       
        if ($row["usu_roles"]=='U')
        {
            header("Location: ../../admin/vista/usuario/micuenta.php");
        }
        else
        {
           echo "<h2> ".$row["usu_roles"]."</h2>"; 
            header("Location: ../../admin/vista/Admin/index.php");  
        }
       }

       
   }else{
       header("Location: ../vista/login.html");
   }
   $conn->close();
?>
