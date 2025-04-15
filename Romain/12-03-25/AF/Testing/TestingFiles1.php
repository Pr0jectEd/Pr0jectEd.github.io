<?php
$nombreArchivo = 'miarchivo.txt';

if (!file_exists($nombreArchivo)) {
    // El archivo no existe, lo creamos
    $archivo = fopen($nombreArchivo, 'w'); // 'w' crea el archivo si no existe, o lo trunca si existe
    if ($archivo) {
        fwrite($archivo, "Este es el contenido inicial del archivo.\n"); // Añade contenido inicial
        fclose($archivo);
        echo "Archivo '$nombreArchivo' creado con contenido inicial.\n";
    } else {
        echo "No se pudo crear el archivo '$nombreArchivo'.\n";
    }
} else {
    echo "El archivo '$nombreArchivo' ya existe.\n";
}

// Ahora, leemos y mostramos el archivo (como en los ejemplos anteriores)
if (file_exists($nombreArchivo)) {
  $contenido = file_get_contents($nombreArchivo);
  echo '<pre>' . htmlspecialchars($contenido) . '</pre>';
} else {
    echo "El archivo no existe";
}
?>