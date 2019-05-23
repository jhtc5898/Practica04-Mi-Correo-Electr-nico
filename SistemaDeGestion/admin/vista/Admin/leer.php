<?php
    session_start();
            if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] ===FALSE)
            {
                        #echo "<script> alert ('No tiene permisos para ingresar');</script>";
                         header("Location: /SistemaDeGestion/public/vista/login.html");
            }
           

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">



<!-- codigo  ajax para buscar  -->

        <script type="text/javascript" src="ajax.js"></script>
        <link type="text/css" href="Css/styleadmin.css" rel="stylesheet">
        <title>Gestion de usuarios </title>
        <?php echo trim($grabado); ?>
       
    </head>
    <header>
        <h1>Leeeer</h1>
        <br>
        <a href="index.php"> &bull; Inicio  </a>
        <a href="micuenta.php">&bull; Mi Cuenta  </a>
    </header>
    <body>
        <table style="width:100%" border=1>
            <tr>
                
                <th>Asunto</th>
                <th>Mensaje</th>


            </tr>

















        
            <div id="informacion"><b> Datos De la Persona </b></div>





















            <?php
                session_start();
                include "../../../config/conexionBD.php";
                $codigo=$_GET['codigo'];

                $sql ="SELECT * FROM mensajeria  WHERE men_codigo = '$codigo'";
              

                
               # echo "  <h2>$sql</h2>"; 
                $result=$conn->query($sql);
               # $borrar="DELETE FROM usuario WHERE usu_cedula='po'";
               
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        
                        echo "<tr>";

                        echo "  <td align=center>" .$row["men_asunto"]."</td>";
                        echo "  <td align=center>" .$row["men_mensaje"]."</td>";
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