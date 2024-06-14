<?php

$apiKey = 'TU_CLAVE_DE_API_DE_SPOONACULAR'; // Reemplaza con tu clave de API

// Configurar la URL de la API
$url = "https://api.spoonacular.com/recipes/complexSearch?query=cake&number=5&apiKey=$apiKey";

// Inicializar cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($ch);

// Verificar si hay errores en cURL
if (curl_errno($ch)) {
    echo 'Error en cURL: ' . curl_error($ch);
    curl_close($ch);
    exit();
}

curl_close($ch);

// Decodificar la respuesta JSON
$data = json_decode($response, true);

// Verificar si la respuesta contiene resultados
if (isset($data['results']) && !empty($data['results'])) {
    echo "<h1>Recetas de Pasteles Populares</h1>";
    echo "<div class='recipes'>";

    foreach ($data['results'] as $recipe) {
        echo "<div class='recipe'>";
        echo "<h2>" . htmlspecialchars($recipe['title']) . "</h2>";
        echo "<img src='" . htmlspecialchars($recipe['image']) . "' alt='" . htmlspecialchars($recipe['title']) . "'>";
        echo "</div>";
    }

    echo "</div>";
} else {
    // Mostrar la respuesta completa para depuración
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    echo "No se encontraron recetas o hubo un error en la solicitud.";
}

?>