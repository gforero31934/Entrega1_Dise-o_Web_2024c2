<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dweb2"; // Reemplaza "nombre_de_tu_base_de_datos" con el nombre de tu base de datos
$port = 3307; // Asegúrate de usar el puerto correcto se cambia a 3307 por fallas con el pueerto 3306

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Seleccionar la base de datos
mysqli_select_db($conn, $database);
?>