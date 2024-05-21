<?php
session_start();


include("connexio.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo'];

    $email = $conn->real_escape_string($email);
    $password = password_hash($conn->real_escape_string($password), PASSWORD_DEFAULT);
    $tipo = $conn->real_escape_string($tipo);

    $sql = "INSERT INTO PERSONA (email, contrasenya, tipo) VALUES ('$email', '$password', '$tipo')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario creado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Usuario</title>
    <link rel="stylesheet" href="styles/comun.css">
</head>
<body>
    <header>
        <h1>Alta de Usuario</h1>
    </header>
    <main>
        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <br>
            <label for="tipo">Tipo de Usuario:</label>
            <select name="tipo">
                <option value="entrenador">Entrenador</option>
                <option value="usuario">Usuario</option>
            </select>
            <br>
            <button type="submit">Crear Usuario</button>
        </form>
    </main>
</body>
</html>
