<?php
// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$detalles = $_POST['detalles'];

// Imprimir los valores de las variables (Para debugging)
var_dump($nombre);
var_dump($cantidad);
var_dump($detalles);

// Abrir el archivo de texto
$archivo = fopen("donaciones.txt", "a");

// Escribir los datos en el archivo
fwrite($archivo, "Nombre del donante: " . $nombre . "\n");
fwrite($archivo, "Cantidad donada: $" . $cantidad . "\n");
fwrite($archivo, "Detalles adicionales: " . $detalles . "\n\n");

// Cerrar el archivo
fclose($archivo);

// Mostrar la lista de máximas donaciones
$donaciones = array(50, 25, 10, $cantidad); // Obtener los datos del archivo de texto
rsort($donaciones); // Ordenar las donaciones en orden descendente
$top_donaciones = array_slice($donaciones, 0, 5); // Mostrar solo las primeras 5 donaciones
echo "<h2>Máximas donaciones:</h2>";
echo "<ul>";
foreach ($top_donaciones as $donacion) {
  echo "<li>Donación de $" . $donacion . "</li>";
}
echo "</ul>";

echo "Gracias por tu donación!";
?>
