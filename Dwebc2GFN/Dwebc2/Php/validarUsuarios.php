<?php

include 'conexion.php';

$login = $_POST["nombreUsuario"];
$password = $_POST["contrasenaUsuario"];

//echo $login;
//echo $password;

$sql = "SELECT * FROM usuarios WHERE idUsuario='$login' AND passUsuario='$password' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "nombre Usuario: " . $row["nombresUsuario"]. " - Apellidos Usuario: " . $row["apellidosUsuario"]. "Tipo Usuario " . $row["tipoUsuario"]. "<br>";
    
        $tipoUsuario = $row["tipoUsuario"];
        echo $tipoUsuario;
        
        switch ($tipoUsuario)
        {
          case "1": header ("Location: ../OpcAdmin.html");
          break;


          case "2": header ("Location: ../OpcCatalogo.html");
        
         
        }

  }
} else {
  echo "0 results";
}

mysqli_close($conn);




?>