<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar Datos</title>
    <style type="text/css" rel="stylesheet">
        .error{
            color: orange;
        }
    </style>
</head>
<body>
    <?php
        include '../../../config/conexionBD.php';
        #echo "<p>ppp</p>";
        $codigo=$_GET['codigo'];
        #echo "<p>$codigo</p>";
        $sql="DELETE FROM usuario WHERE usu_codigo='$codigo'";

        if($conn->query($sql)===TRUE){
            echo "<p> Se ha eliminado el registro </p>";
        }else{
            if($conn->errno ==1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistemas </p>";
                
            }else{
                echo"<p class='error' Error: ".mysql_error($conn). "</p>";
            }
        }

        $conn->close();
        echo "<a href='index.php'>Regresar</a> "

    ?>

</body>
</html>