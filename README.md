# Practica04-Mi-Correo-Electr-nico
Correos Electronicos

 	
PRÁCTICA DE LABORATORIO
CARRERA: INGENIERIA DE SISTEMA/COMPUTACION	ASIGNATURA: HIPERMEDIAL
NRO. PRÁCTICA:	4	TÍTULO PRÁCTICA: Resolución de problemas sobre PHP y MySQL
OBJETIVO
•	Entender y organizar de una mejor manera los sitios de web en Internet
•	Diseñar adecuadamente elementos gráficos en sitios web en Internet.
•	Crear sitios web aplicando estándares actuales.

















INSTRUCCIONES	
Con base al archivo Práctica 04 – Creación de una aplicación web usando PHP y Base de Datos, se pide realizar los siguientes ajustes:

a)	Agregar roles a la tabla usuario. Un usuario puede tener un rol de “admin” o “user”
b)	Los usuarios con rol de “admin” pueden únicamente: modificar, eliminar y cambiar la contraseña de cualquier usuario de la base de datos.
c)	Los usuarios con rol de “user” pueden modificar, eliminar y cambiar la contraseña de su usuario.

Luego, con base a estos ajustes realizados, se pide desarrollar una aplicación web usando PHP y Base de Datos que permita gestionar (enviar y recibir) mensajes electrónicos entre usuarios de la aplicación. De los mensajes electrónicos se desea conocer la fecha y hora, remitente, destinatario, asunto y mensaje. Para lo cuál, se pide como mínimo los siguientes requerimientos:

Usuario con rol de user:

d)	Visualizar en su pagina principal (index.php) el listado de todos los mensajes electrónicos recibidos, ordenados por los más recientes.
e)	Visualizar el listado de todos los mensajes electrónicos enviados, ordenados por los más recientes.
f)	Enviar mensajes electrónicos a otros usuarios de la aplicación web.
g)	Buscar todos los mensajes electrónicos recibidos. La búsqueda se realizará por el correo del usuario remitente y se deberá aplicar Ajax para la búsqueda.
h)	Buscar todos los mensajes electrónicos enviados. La búsqueda se realizará por el correo del usuario destinatario y se deberá aplicar Ajax para la búsqueda.
i)	Modificar los datos del usuario.
j)	Cambiar la contraseña del usuario.
k)	Agregar un avatar (fotografía) a la cuenta del usuario.

Usuario con rol de admin:

l)	No puede recibir ni enviar mensajes electrónicos.
m)	Visualizar en su pagina principal (index.php) el listado de todos los mensajes electrónicos, ordenados por los más recientes.
n)	Eliminar los mensajes electrónicos de los usuarios con rol “user”.
o)	Eliminar, modificar y cambiar contraseña de los usuarios con rol “user”.
 

	Por último, se debe aplicar parámetros de seguridad a través del uso de sesiones. Para lo cuál, se debe tener en cuenta:

p)	Un usuario “anónimo”, es decir, un usuario que no ha iniciado sesión puede acceder únicamente a los archivos de la carpeta pública.
q)	Un usuario con rol de “admin” puede acceder únicamente a los archivos de la carpeta admin  vista  admin y admin  controladores  admin
r)	Un usuario con rol de “user” puede acceder únicamente a los archivos de la carpeta admin  vista  user y admin  controladores  user

Prototipo de ejemplo de los archivos index de la practica:

 

Figura 1: Index del usuario con rol "user"



 

Figura 2: Index del usuario con rol "admin"

ACTIVIDADES POR DESARROLLAR
1.	Generar el diagrama E-R para la solución de la práctica
2.	Crear un repositorio en GitHub con el nombre “Practica04 – Mi Correo Electrónico”
3.	Realizar un commit y push por cada requerimiento de los puntos antes descritos.
 

4.	Luego, se debe crear el archivo README del repositorio de GitHub.
5.	Generar informe de los resultados en el formato de prácticas. Debe incluir:
a.	El diagrama E-R de la solución propuesta.
b.	Nombre de la base de datos
c.	Sentencias SQL de la estructura de la base de datos
d.	El desarrollo de cada uno de los requerimientos antes descritos.
e.	La evidencia del correcto diseño de las páginas HTML usando CSS. Para lo cuál, se puede generar fotografías instantáneas (pantallazos).
f.	La evidencia del correcto funcionamiento de cada uno de los puntos requeridos.
g.	El informe debe incluir conclusiones apropiadas.
h.	En el informe se debe incluir la información de GitHub (usuario y URL del repositorio de la práctica)
i.	En el informe se debe incluir la firma digital del estudiante.
6.	En el archivo README del repositorio debe constar la misma información del informe de resultados de la práctica que se indica en el punto anterior.

RESULTADO(S) OBTENIDO(S):
•	Tener el conocimiento suficiente para que el estudiante pueda entender y organizar de una mejor manera los sitios de web y de negocios en Internet
CONCLUSIONES:
•	Los estudiantes podrán organizar sitios web basados en el lenguaje de programación PHP para persistir información en una base de datos relacional.
RECOMENDACIONES:
•	Probar la solución de la práctica en al menos tres navegadores web; Google Chrome, Firefox y Safari



Docente: Ing. Gabriel León Paredes, PhD.
Firma:   Firma:  












	 

El diagrama E-R de la solución propuesta.
 

NOMBRE DE LA BASE DE DATOS

Base de Datos:hipermedial

 

Codigo De Agregacion De La Base De Datos Mamp
<?php
    $db_servername="localhost";
    $db_username="root";
    $db_password="root";
    $db_name="hipermedial";
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);;
    $conn->set_charset("utf8");

    #probar la conexion  
    if($conn->connect_error){
        die("Conexion fallida: ".$conn->connect_error);
    }else{
        #echo"<h1> Conexion exitosa </h1>";
    }
?>

Para realizar la conexión necesitamos de nuestro usuario y clave que son:
    $db_username="root";
    $db_password="root";
Necesitamos la agregación de la base que vamos utilizar:
     $db_name="hipermedial";
Y creamos la conexión a través de:
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
 



   
Sentencias SQL de la estructura de la base de datos

Codigo sql para la Creacion de la Base De Datos :
CREATE TABLE `usuario` (
`usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
`usu_cedula` varchar(10) NOT NULL,
`usu_nombres` varchar(50) NOT NULL,
`usu_apellidos` varchar(50) NOT NULL,
`usu_direccion` varchar(75) NOT NULL,
`usu_telefono` varchar(20) NOT NULL,
`usu_correo` varchar(20) NOT NULL,
`usu_password` varchar(255) NOT NULL,
`usu_rol` varchar(5) NOT NULL,
`usu_fecha_nacimiento` date NOT NULL,
`usu_eliminado` varchar(1) NOT NULL DEFAULT 'N',
`usu_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`usu_fecha_modificacion` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`usu_codigo`),
UNIQUE KEY `usu_cedula` (`usu_cedula`))
 ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;	CREATE TABLE 'foto'(
`fot_codigo` int(11) NOT NULL AUTO_INCREMENT,
`fot_nombre` varchar(30) NOT NULL,
`fot_foto` varchar(200) NOT NULL,
`usu_codigo` int NOT NULL,

PRIMARY KEY (`fot_codigo`),
FOREIGN KEY (`usu_codigo`) REFERENCES usuario(usu_codigo)

)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
	CREATE TABLE `mensajeria` (
`men_codigo` int(11) NOT NULL AUTO_INCREMENT,
`men_destinatario` varchar(100) NOT NULL,
`men_remitente` varchar(100) NOT NULL,
`men_asunto` varchar(600) NOT NULL,
`men_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`men_mensaje` varchar(600) NOT NULL,
`usu_codigo` int NOT NULL,

PRIMARY KEY (`men_codigo`),
FOREIGN KEY (`usu_codigo`) REFERENCES usuario(usu_codigo)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
	CREATE TABLE `usuario` (
`usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
`usu_cedula` varchar(10) NOT NULL,
`usu_nombres` varchar(50) NOT NULL,
`usu_apellidos` varchar(50) NOT NULL,
`usu_direccion` varchar(75) NOT NULL,
`usu_telefono` varchar(20) NOT NULL,
`usu_correo` varchar(20) NOT NULL,
`usu_password` varchar(
255
) NOT NULL,
`usu_fecha_nacimient
o` date NOT NULL,
`usu_eliminado` varchar(1) NOT NULL DEFAULT 'N',
`usu_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`usu_fecha_modificacion` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`usu_codigo`),
UNIQUE KEY `usu_cedula` (`usu_
cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


a)	Agregar roles a la tabla usuario. Un usuario puede tener un rol de “admin” o “user”

Para la Agregacion de roles  debemos agregar a nuestro código sql;

`usu_roles` varchar(20) NOT NULL,

Se nos presentara de la siguiente manera en phpMyAdmin:

 
p)	Los usuarios con rol de “admin” pueden únicamente: modificar, eliminar y cambiar la contraseña de cualquier usuario de la base de datos.
Administrador 
User:admin@gmail.com
Contraseña:admin
 

Modificar
 	Eliminar

 	Modificar Contraseña

 






•	Codigo SQL Para Realizar Modificar Eliminar Contraseña
Modificar

$sql="UPDATE usuario SET usu_nombres='$nombre', usu_apellidos='$apellido', usu_cedula='$cedula', usu_direccion='$direccion',usu_roles='$rol',
                usu_fecha_nacimiento='$fechaNacimiento', usu_fecha_modificacion='$modificacion' WHERE usu_codigo='$codigo'";
	Eliminar

$sql="DELETE FROM usuario WHERE usu_codigo='$codigo'";

	Cambiar Contraseña

$sqlCambiar="UPDATE usuario SET usu_password=MD5('$contrasena_nueva'), usu_fecha_modificacion='$modificacion' WHERE usu_codigo='$codigo'";
      


•	Los usuarios con rol de “user” pueden modificar, eliminar y cambiar la contraseña de su usuario.

 
Codigo SQL;

Modificar

$sql="UPDATE usuario SET usu_nombres='$nombre', usu_apellidos='$apellido', usu_cedula='$cedula', usu_direccion='$direccion',usu_roles='$rol',
                usu_fecha_nacimiento='$fechaNacimiento', usu_fecha_modificacion='$modificacion' WHERE usu_codigo='$codigo'";
	Eliminar

$sql="DELETE FROM usuario WHERE usu_codigo='$codigo'";

	Cambiar Contraseña

$sqlCambiar="UPDATE usuario SET usu_password=MD5('$contrasena_nueva'), usu_fecha_modificacion='$modificacion' WHERE usu_codigo='$codigo'";
      


Para modificar realizamos un update para actualizar cada uno de los datos que se encuentran en la base de datos.
Para eliminar realizamos un delete con el código del usuario.
Para cambiar la contraseña utilizamos un update para cambiar la contraseña





Usuario con  rol de user:

a)	Visualizar en su pagina principal (index.php) el listado de todos los mensajes electrónicos recibidos, ordenados por los más recientes.
Index.php

 

Codigo De Index Para Realizar Mensajes Recibidos

<?php
session_start();
include "../../../config/conexionBD.php";
$sql ="SELECT * FROM mensajeria  WHERE men_destinatario = '$grabado' ";



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


Con este código logramos realizar una consulta que nos permite llegar cada uno de los td de nuestra tabla con los campos que encontramos en Nuestra Base De Datos.




b)	Visualizar el listado de todos los mensajes electrónicos enviados, ordenados por los más recientes.

MensajesEnviados.php
 
Código De Mostrar todos los Mensajes Enviados:
<?php
                session_start();
                include "../../../config/conexionBD.php";
                $sql ="SELECT * FROM mensajeria  WHERE usu_codigo = '$codigo'";
                 #echo "  <h2>$sql</h2>"; 
                $result=$conn->query($sql);
               # $borrar="DELETE FROM usuario WHERE usu_cedula='po'";
               
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        
                        echo "<tr>";
                        $codigo=$row["usu_codigo"];
                        echo "  <td align=center>" .$row["men_destinatario"]."</td>";
                        echo "  <td align=center>" .$row["men_remitente"]."</td>";
                        echo "  <td align=center>" .$row["men_asunto"]."</td>";
                        echo "  <td align=center>" .$row["men_fecha_creacion"]."</td>";
                        echo "  <td align=center>" .$row["men_mensaje"]."</td>";
                        echo "  <td align=center>" .$row["usu_codigo"]."</td>";
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


Con este código logramos realizar un selecto de todos los mensajes que un código específico de una persona para poder presentar en la tabla todos sus mensajes.
















c)	Enviar mensajes electrónicos a otros usuarios de la aplicación web.

 
Codigo Utilizado para Crear un Nuevo Mensaje:
<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] ===FALSE){
        #echo "<script> alert ('No tiene permisos para ingresar');</script>";
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
          if ($_SESSION['codigo'])
            {
                        $codigo=$_SESSION['codigo']; //Si existe un nickname generamos el mensaje
            }
            
    else
            {
                        $codigo="<h1>No se Guardo<h1>"; //Mensaje que no existe nada Grabado
            }

        include "../../../config/conexionBD.php";

        $correo=isset($_POST["correo"]) ? trim($_POST["correo"]):null;
        $asunto=isset($_POST["asunto"]) ? mb_strtoupper(trim($_POST["asunto"]),"UTF-8"):null;
        $mensaje=isset($_POST["mensaje"]) ? mb_strtoupper(trim($_POST["mensaje"]),"UTF-8"):null;
       

        $sql="INSERT INTO mensajeria VALUES(0,'$correo','$grabado','$asunto',NULL,'$mensaje','$codigo')";

        echo "<a>$sql</a>"; 
        
        if($conn->query($sql)===TRUE){
            echo "<p> Se ha creado los datos personales correctamente </p>";
            header("Location:MensajesEnviados.php"); 
        }else{
            
            if($conn->errno ==1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistemas </p>";
                
            }else{
                echo"<p class='error' Error: ".mysql_error($conn). "</p>";
            }
        }

        $conn->close();
        echo "<a href='MensajesEnviados.php'>Revisar</a> "

    ?>

Realizamos Un insert para subir Nuestros mensajes
 
  $sql="INSERT INTO mensajeria VALUES(0,'$correo','$grabado','$asunto',NULL,'$mensaje','$codigo')";

d)	Buscar todos los mensajes electrónicos recibidos. La búsqueda se realizará por el correo del usuario remitente y se deberá aplicar Ajax para la búsqueda.
e)	Buscar todos los mensajes electrónicos enviados. La búsqueda se realizará por el correo del usuario destinatario y se deberá aplicar Ajax para la búsqueda.


 
Caja De Texto

<form>
<input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese el correo ..." onkeyup="buscarPorCorreo()">
</form>
<br>

<div id="informacion"><b> Datos De Las Personas </b></div>

	Codigo Ajax

function buscarPorCorreo()
{
var cedula = document.getElementById("cedula").value;
if(cedula == "")
{
document.getElementById("informacion").innerHTML = "";
}
else 
{
    if(window.XMLHttpRequest)
        {
            xmlhttp = new XMLHttpRequest(); 
        }
        else
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
             document.getElementById("informacion").innerHTML = this.responseText;   
            }
        };
        xmlhttp.open("GET","buscar.php?cedula="+cedula,true);
        xmlhttp.send();
}
}

	Codigo Buscar.php


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



f)	Modificar los datos del usuario.
g)	Cambiar la contraseña del usuario.

 
Codigo SQL;

Modificar

$sql="UPDATE usuario SET usu_nombres='$nombre', usu_apellidos='$apellido', usu_cedula='$cedula', usu_direccion='$direccion',usu_roles='$rol',
                usu_fecha_nacimiento='$fechaNacimiento', usu_fecha_modificacion='$modificacion' WHERE usu_codigo='$codigo'";
	Eliminar

$sql="DELETE FROM usuario WHERE usu_codigo='$codigo'";

	Cambiar Contraseña

$sqlCambiar="UPDATE usuario SET usu_password=MD5('$contrasena_nueva'), usu_fecha_modificacion='$modificacion' WHERE usu_codigo='$codigo'";
      


Para modificar realizamos un update para actualizar cada uno de los datos que se encuentran en la base de datos.
Para eliminar realizamos un delete con el código del usuario.
Para cambiar la contraseña utilizamos un update para cambiar la contraseña


Agregar Un Avatar (Fotografía) A La Cuenta Del Usuario












Codigo Utilizado para subir la imagen:
            <?php
                session_start();
                include "../../../config/conexionBD.php";
              
                if ($_SESSION['codigo'])
                {
                            $codigo=$_SESSION['codigo']; //Si existe un nickname generamos el mensaje
                }
                
        else
                {
                            $codigo="<h1>No se Guardo<h1>"; //Mensaje que no existe nada Grabado
                }
                $nom=$_REQUEST["txtnom"];
                $foto=$_FILES["foto"]["name"];
                $ruta=$_FILES["foto"]["tmp_name"];
                $destino="fotos/".$foto;
                copy($ruta,$destino);
                $sql ="INSERT INTO foto VALUES ('0','$nom','$destino','$codigo')";
                if($conn->query($sql)===TRUE){
                echo "<p> Se ha creado los datos personales correctamente </p>";
                header('Location:micuenta.php');
                 }else{
                  if($conn->errno ==1062){
               echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistemas </p>";
                
               }else{
                echo"<p class='error' Error: ".mysql_error($conn). "</p>";
                 }
                  }   $conn->close();
                echo "<a href='micuenta.php'>Regresar</a> "
            ?>

Usuario con rol de admin:

a)	No puede recibir ni enviar mensajes electrónicos.
 
b)	Visualizar en su pagina principal (index.php) el listado de todos los mensajes electrónicos, ordenados por los más recientes.

 
Codigo Sql Para la Presentacion De los Mensajes

            <?php
                session_start();
                include "../../../config/conexionBD.php";
                $sql ="SELECT * FROM mensajeria   ";
                #echo "  <h2>$sql</h2>"; 
                $result=$conn->query($sql);
               # $borrar="DELETE FROM usuario WHERE usu_cedula='po'";
               
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        
                        echo "<tr>";
                        $codigo=$row["men_codigo"];
                        echo "  <td align=center>" .$row["men_destinatario"]."</td>";
                        echo "  <td align=center>" .$row["men_remitente"]."</td>";
                        echo "  <td align=center>" .$row["men_asunto"]."</td>";
                        echo "  <td align=center>" ."<a href='leer.php?codigo=$codigo'>leer</a>"."</td>";
                        echo "  <td align=center>" .$row["men_fecha_creacion"]."</td>";
                        echo "  <td align=center>" .$row["usu_codigo"]."</td>";
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










c)	Eliminar los mensajes electrónicos de los usuarios con rol “user”.
d)	Eliminar, modificar y cambiar contraseña de los usuarios con rol “user”.

 
Codigo sql Utilizado:

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

Realizamos una consulta 
Donde podemos mirar cada uno de los Usuario que se ecuentranr en la base de datos 
$sql ="SELECT * FROM usuario ";  
De esta forma agregamos a cada uno un leer mensaje




GitHub
Usuario: jhtc5898

Repositorio: https://github.com/jhtc5898/Practica04-Mi-Correo-Electr-nico

Conclusiones:
Gracias a esta practica comprendimos de mejor manera el uso de pH para la administración de una pagina HTML y mejorar su rendimiento con el uso de JavaScript lo cual en esta practica nos ayudo al realizar el Ajax que nos permitía tener una pagina mas interactiva de la misma forma al usar php para realizar el envió de parámetros importantes entre páginas. Nos permitió mejorar nuestro conocimiento sobre Html,Php,JavaScript  gracias a el uso de diferentes actividades como en index.php que tenemos que realizar una consulta a la base de datos y agregación en una tabla esto mejoro nuestro conocimiento y la forma de emplear diferentes herramientas.
