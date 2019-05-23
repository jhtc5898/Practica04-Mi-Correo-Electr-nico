
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
               # echo " <h2>$sql</h2>";

                
                if($conn->query($sql)===TRUE){
                echo "<p> Se ha creado los datos personales correctamente </p>";
                header('Location:micuenta.php');
                 }else{
                  if($conn->errno ==1062){
               echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistemas </p>";
                
               }else{
                echo"<p class='error' Error: ".mysql_error($conn). "</p>";
                 }
                  }

                $conn->close();
                echo "<a href='micuenta.php'>Regresar</a> "
            ?>