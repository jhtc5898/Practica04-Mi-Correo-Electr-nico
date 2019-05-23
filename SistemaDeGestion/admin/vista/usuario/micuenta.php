<?php
    session_start();
            if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] ===FALSE)
            {
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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="ajax.js"></script>
        <link type="text/css" href="Css/styleusuario.css" rel="stylesheet">
        <title>Perfil De Usuario </title>
    </head>
    <header>
        <h1>Informacion Usuario</h1>
        <br>
        <a href="index.php"> &bull; Inicio  </a>
        <a href="NuevoMensaje.html"> &bull; Nuevo Mensaje  </a>
        <a href="MensajesEnviados.php"> &bull; Mensajes Enviados </a>
        <a href="micuenta.php">&bull; Mi Cuenta  </a>
    </header>
    <body>
        <table style="width:100%" border=1>
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Fecha Nacimiento </th>
                <th> Fecha Modificacion </th>
                <th>Modificar </th>
                <th> Cambiar Contrasena</th>

            </tr>
            <br>
            <div id="informacion"><b> Datos De la Persona </b></div>


            <form action="valida_foto.php" method="POST" enctype="multipart/form-data" >
            <strong>Nombre Para Su Perfil:</strong>
            <input type="text" name="txtnom" value=""> 
            <br>
            <strong>Foto De Perfil:</strong>
            <input type="file" name="foto" id="foto"> 
            <br>
            <input type="submit" name="enviar" value="Subir Foto"> 
            </form>

           





            <?php
                session_start();
                include "../../../config/conexionBD.php";
                $sql ="SELECT * FROM usuario  WHERE usu_correo = '$grabado'";
              
                
                #echo "  <h2>$sql</h2>"; 
                $result=$conn->query($sql);
               # $borrar="DELETE FROM usuario WHERE usu_cedula='po'";
               
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        
                        echo "<tr>";
                        $codigo=$row["usu_codigo"];
                        $_SESSION['codigo']=$codigo;
                        echo "  <td align=center>" .$row["usu_cedula"]."</td>";
                        echo "  <td align=center>" .$row["usu_nombres"]."</td>";
                        echo "  <td align=center>" .$row["usu_apellidos"]."</td>";
                        echo "  <td align=center>" .$row["usu_direccion"]."</td>";
                        echo "  <td align=center>" .$row["usu_telefono"]."</td>";
                        echo "  <td align=center>" .$row["usu_correo"]."</td>";
                        echo "  <td align=center>" .$row["usu_fecha_nacimiento"]."</td>";
                        echo "  <td align=center>" .$row["usu_fecha_modificacion"]."</td>";
                        echo "  <td align=center>" ."<a href='modificar.php?codigo=$codigo'>Modificar</a>". "</td>";
                        echo "  <td align=center>" ."<a href='cambiar.php?codigo=$codigo'>Cambiar Contrasena</a>". "</td>";

                        echo "</tr>";
                       
                    }
                }else{
                    echo "<tr>";
                    echo " <td colspan='7'>No existen usuarios en el sistema </td>";
                    echo "</tr>";
                }


                $sql2 ="SELECT * FROM foto WHERE   usu_codigo = '$codigo' ";
              
                
               # echo "  <h2>$sql2</h2>"; 
                $result2=$conn->query($sql2);
                
                if($result2->num_rows>0){
                    while($row=$result2->fetch_assoc())
                    {
                        echo "<h4>Perfil De ".$row["fot_nombre"]."</h4> ";
                        echo '<img src=" '.$row["fot_foto"].' "width="200" height="200"><br>';
                    }
                }
                $var1="Hola";
                #echo "<a href='mod.php?hola=$var1'>Enviar</a>";
                $conn->close();
            ?>
    </body>
</html>