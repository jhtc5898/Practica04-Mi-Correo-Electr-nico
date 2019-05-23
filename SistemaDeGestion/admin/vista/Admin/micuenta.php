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
        <title>Gestion de Usuarios </title>
        <link type="text/css" href="Css/styleadmin.css" rel="stylesheet">
       
       
    </head>
    <header>
        <h1>Informacion Usuarios (Administracion)</h1>
        <br>
        <a href="index.php"> &bull; Inicio  </a>
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
                <th> Rol </th>
                <th>Modificar </th>
                <th> Eliminar </th>
                <th> Cambiar Contrasena</th>

            </tr>



            <form>
            <input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese el correo ..." onkeyup="buscarPorCorreo()">
            </form>
            <br>

            <div id="informacion"><b> Datos De Las Personas </b></div>

           



            <?php
                session_start();
                include "../../../config/conexionBD.php";
                $sql ="SELECT * FROM usuario ";
              
                
                echo "  <h2>Usuarios De La Plataforma</h2>"; 
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
                        echo "  <td align=center>" .$row["usu_roles"]."</td>";
                        echo "  <td align=center>" ."<a href='modificar.php?codigo=$codigo'>Modificar</a>". "</td>";
                        echo "  <td align=center>" ."<a href='eliminar.php?codigo=$codigo'>Eliminar</a>". "</td>";
                        echo "  <td align=center>" ."<a href='cambiar.php?codigo=$codigo'>Cambiar Contrasena</a>". "</td>";

                        echo "</tr>";
                       
                    }
                }else{
                    echo "<tr>";
                    echo " <td colspan='7'>No existen usuarios en el sistema </td>";
                    echo "</tr>";
                }



                        
                $conn->close();
            ?>
    </body>
</html>