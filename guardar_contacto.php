<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario con seguridad
    $nombre = htmlspecialchars($_POST["nombre"]);
    $empresa = htmlspecialchars($_POST["empresa"]);
    $email = htmlspecialchars($_POST["email"]);
    $telefono = htmlspecialchars($_POST["telefono"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    // Nombre del archivo CSV donde se guardarán los datos
    $archivo_csv = "mensajes_contacto.csv";

    // Abrir el archivo en modo de escritura (agregar datos)
    $archivo = fopen($archivo_csv, "a");

    // Si el archivo está vacío, agregar los encabezados
    if (filesize($archivo_csv) == 0) {
        fputcsv($archivo, ["Nombre", "Empresa", "Correo", "Teléfono", "Mensaje"]);
    }

    // Agregar los datos del formulario como una nueva fila
    fputcsv($archivo, [$nombre, $empresa, $email, $telefono, $mensaje]);

    // Cerrar el archivo
    fclose($archivo);

    // Confirmación de éxito
    echo "Gracias, $nombre. Tu mensaje se ha guardado correctamente.";
} else {
    echo "Método no permitido. Por favor, usa el formulario.";
}
?>
