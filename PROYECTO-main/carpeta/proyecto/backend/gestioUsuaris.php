<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="styles/comun.css">
</head>
<body>
    <header>
        <h1>Gestión de Usuarios</h1>
    </header>
    <main>
        <button onclick="location.href='altaUsuario.php'">Dar de alta un nuevo usuario</button>
        <button onclick="location.href='modificarUsuario.php'">Modificar datos de un usuario</button>
        <button onclick="location.href='bajaUsuario.php'">Dar de baja a un usuario</button>
    </main>
</body>
</html>
