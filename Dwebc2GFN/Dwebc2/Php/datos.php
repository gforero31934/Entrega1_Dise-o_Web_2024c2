<?php

include "conexion.php";

//$nombres =$_POST["nombre"];
//$apellidos=$_POST["apellido"];
//$edad = $_POST["edad"];
//$genero = $_POST["genero"];
//$id = $_POST["id"];
//$email = $_POST["email"];

$nombreP =$_POST["nombreP"];
$descriptionP =$_POST["descriptionP"];
$valorP =$_POST["valorP"];
//$imagenP =$_POST["imagenP"];
$impuestoIVA = $valorP*0.19;
$totalP = $valorP+$impuestoIVA;

echo $nombreP;
echo $descriptionP;
echo $valorP;
echo $impuestoIVA;
echo $totalP;

$sql = "INSERT INTO productos (nombreProducto, descripcionnProducto, valorProducto, ivaProducto, totalProducto  )
VALUES ('$nombreP', '$descriptionP', '$valorP', '$impuestoIVA', '$totalP')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>