<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">



<!-- codigo  ajax para buscar  -->

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


            </tr>



    
            <div id="informacion"><b>Datos Encontrados </b></div>


    <?php
    $cedula = $_GET['cedula'];
    
    include "..\..\..\config\conexionBD.php";
    $sql="SELECT * FROM mensajeria WHERE men_remitente LIKE ('%$cedula%')";
    
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            
            echo "<tr>";
            $codigo=$row["usu_codigo"];
            $_SESSION['codigo']=$codigo;
            echo "  <td align=center>" .$row["men_destinatario"]."</td>";
            echo "  <td align=center>" .$row["men_remitente"]."</td>";
            echo "  <td align=center>" .$row["men_asunto"]."</td>";
            echo "  <td align=center>" .$row["men_fecha_creacion"]."</td>";
            echo "  <td align=center>" ."<a href='leer.php?codigo=$codigo'>leer</a>"."</td>";
                       
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
