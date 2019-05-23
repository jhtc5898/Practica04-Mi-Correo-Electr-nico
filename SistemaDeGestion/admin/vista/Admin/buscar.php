<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="ajax.js"></script>
        <title>Gestion de Usuarios </title>
    </head>
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

    
            <div id="informacion"><b>Datos Encontrados </b></div>


    <?php
    $cedula = $_GET['cedula'];
    
    include "..\..\..\config\conexionBD.php";
    $sql="SELECT * FROM usuario WHERE usu_correo LIKE ('%$cedula%')";
    
    $result = $conn->query($sql);
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

    ?>

</body>
</html>
