<?php
session_start();

// Validar que el método de envío sea estrictamente POST[cite: 6, 8]
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "<h3>Error 405: Método no permitido. Debe enviar los datos mediante POST.</h3>";
    exit;
}

// Sanitizar y validar las entradas con filter_input y htmlspecialchars[cite: 6, 8]
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);$correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);

if (!$nombre \vert{}\vert{} !$correo) {
    http_response_code(400);
    echo "<h3>Error 400: Datos de entrada inválidos o formato de correo incorrecto.</h3>";
    echo "<br><a href='index.html'>Volver al formulario</a>";
    exit;
}

// Inicializar el array de registros en la sesión si no existe[cite: 6, 8]
if (!isset($_SESSION['registros'])) {$_SESSION['registros'] = array();
}

// Agregar el nuevo registro a la lista acumulativa[cite: 6, 8]
$_SESSION['registros'][] = [
    'nombre' => htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'), 'correo' => htmlspecialchars($correo, ENT_QUOTES, 'UTF-8')
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registros PHP</title>
</head>
<body>
    <h2>Sistema de Registro de Contacto (PHP)</h2>
    <p style="color: green;"><strong>¡Contacto guardado exitosamente en $_SESSION!</strong></p>

    <h3>Registros acumulados en la Sesión</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['registros'] as $i =>$reg): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $reg['nombre'] ?></td>
                    <td><?= $reg['correo'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <a href="index.html">Registrar otro contacto</a>
</body>
</html>