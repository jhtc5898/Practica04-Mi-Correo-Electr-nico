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



<!-- codigo  ajax para buscar  -->

        <script type="text/javascript" src="ajax.js"></script>
        <title>Gestion de usuarios </title>
        
        <link type="text/css" href="Css/styleusuario.css" rel="stylesheet">
       
       
    </head>
    <header>
        <h1>Listado De Mensajes Registrados</h1>
        <br>
        <a href="index.php"> &bull; Inicio  </a>
        <a href="NuevoMensaje.html"> &bull; Nuevo Mensaje  </a>
        <a href="MensajesEnviados.php"> &bull; Mensajes Enviados </a>
        <a href="micuenta.php">&bull; Mi Cuenta  </a>
        <a href="cerrar_sesion.php">&bull; Cerrar Sesion  </a>
    </header>
    <body>
        <table style="width:100%" border=1>
            <tr>
                <th>Remitente</th>
                <th>Asunto</th>
                <th>Fecha Creacion</th>
                <th>Mensaje</th>


            </tr>

















            <form>
            <input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese el correo ..." onkeyup="buscarPorCorreo()">
            </form>
            <br>

            <div id="informacion"><b> Datos De Las Personas </b></div>


            <?php
                session_start();
                include "../../../config/conexionBD.php";
                $sql ="SELECT * FROM mensajeria  WHERE men_destinatario = '$grabado'  order by men_fecha_creacion DESC  ";
              

                
               # echo "  <h2>$sql</h2>"; 
                $result=$conn->query($sql);
               # $borrar="DELETE FROM usuario WHERE usu_cedula='po'";
               
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        
                        echo "<tr>";
                        $codigo=$row["men_codigo"];
                        echo "  <td align=center>" .$row["men_remitente"]."</td>";
                        echo "  <td align=center>" .$row["men_asunto"]."</td>";
                        echo "  <td align=center>" .$row["men_fecha_creacion"]."</td>";
                        echo "  <td align=center>" ."<a href='leer.php?codigo=$codigo'>leer</a>"."</td>";
                        echo "</tr>";
                       
                    }
                  
        
                }else{
                    echo "<tr>";
                    echo " <td colspan='7'>No existen Mensajes en el Sistema </td>";
                    echo "</tr>";
                }
                $var1="Hola";
                #echo "<a href='mod.php?hola=$var1'>Enviar</a>";
                $conn->close();
            ?>
    </body>
</html>