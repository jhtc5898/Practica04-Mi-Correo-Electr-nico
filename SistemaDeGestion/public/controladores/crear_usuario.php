<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error{
            <color:black></color:black>;
        }
*
{
    background-color: burlywood;
}
p
{
    width: 300px;
    height: 300px;
    text-align: center;
    margin:0 auto;
    padding: 20px;
    font: small-caps 100%/200% serif;
    font-size: 150%
} 
a
{
    width: 150px;
    height: 150px;
    text-align: center;
    margin:0 auto;
    padding: 20px;
    font: small-caps 100%/200% serif;
    font-size: 250%
}

    </style>
</head>
<body>
    <?php
        include '../../config/conexionBD.php';

        $cedula=isset($_POST["cedula"]) ? trim($_POST["cedula"]):null;
        $nombres=isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"):null;
        $apellidos=isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]),"UTF-8"):null;
        $direccion=isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
        $telefono=isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
        $fechaNacimiento=isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]):null;
        $correo=isset($_POST["correo"]) ? trim($_POST["correo"]):null;
        $contraseña=isset($_POST["contraseña"]) ? trim($_POST["contraseña"]):null;

        $sql="INSERT INTO usuario VALUES(0,'$cedula','$nombres','$apellidos','$direccion','$telefono','$correo',MD5('$contraseña'),'U','$fechaNacimiento','N',null,null)";

        
        if($conn->query($sql)===TRUE){
            echo "<p> Se ha creado los datos personales correctamente </p>";
        }else{
            if($conn->errno ==1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistemas </p>";
                
            }else{
                echo"<p class='error' Error: ".mysql_error($conn). "</p>";
            }
        }

        $conn->close();
        echo "<a href='../vista/login.html'>Iniciar Sesion</a> "

    ?>

</body>
</html>
