<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar</title>
    <link type="text/css" href="Css/styleusuario.css" rel="stylesheet">
      
</head>
<header>
    <h1>Modificar Usuario</h1>
</header>
<body >
    <?php
    include "../../../config/conexionBD.php";
    $codigo=$_GET['codigo'];
    $sql ="SELECT * FROM usuario WHERE usu_codigo=$codigo";
    $result=$conn->query($sql);
    # echo "<p>$codigo</p>";
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
        $nombre=$row["usu_nombres"];
        $apellido=$row["usu_apellidos"];
        $direccion=$row["usu_direccion"];
        $telefono=$row["usu_telefono"];
        $fecha=$row["usu_fecha_nacimiento"];
        $cedula=$row["usu_cedula"]; 
        echo "<form id='formulario1' method='POST' action='actualizar.php'>";

        echo "<label for='codigo'>Codigo</label>";
        echo "<input  type='text' readonly='readonly' id='codigo' name='codigo' value='$codigo' required/>";
        echo "<br>";

        echo  " <label for='cedula'>Cedula </label>";
        echo "  <input type='text' id='cedula' name='cedula' value='$cedula'  required/>";

        echo "<br>";
    
        echo "   <label for='nombres'>Nombres </label>";
        echo "  <input type='text' id='nombres' name='nombres' value='$nombre'  required/>";
    
        echo " <br>";
    
        echo "   <label for='apellidos'>Apellido </label>";
        echo "  <input type='text' id='apellidos' name='apellidos' value='$apellido'  required/>";
    
        echo "<br>";
    
        echo "  <label for='direccion'>Direccion </label>";
        echo "<input type='text' id='direccion' name='direccion' value='$direccion' required/>";
    
        echo "<br>";
    
        echo " <label for='telefono'>Telefono </label>";
        echo " <input type='text' id='telefono' name='telefono' value='$telefono'  required/>";
    
        echo "<br>";
            
        echo "<label for='fecha'>Fecha Nacimiento </label>";
        echo " <input type='date' id='fechaNacimiento' name='fechaNacimiento' value='$fecha' required/>";
    
        echo " <br>";
    
        echo" <input type='submit' id='crear' name='crear' value='Modificar' />";
        echo" <input type='reset' id='cancelar' name='cancelar' value='Cancelar'/>";
        echo "</form>";
        }
    }else{
        echo "<tr>";
        echo " <td colspan='7'>No existen usuarios en el sistema </td>";
        echo "</tr>";
    }
        
      ?>  

</body>
</html>