<?php
session_start();
include("connexio.php");

// Obtener datos del formulario
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

// Evitar inyecciones SQL
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

// Consulta a la base de datos para verificar el usuario
$sql = "SELECT * FROM PERSONA WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $fila = mysqli_fetch_array($result);
    
    // Verificar la contraseña (suponiendo que esté almacenada de forma segura con password_hash)
    if (password_verify($password, $fila['contrasenya'])) {
        // Contraseña correcta, iniciar sesión
        $_SESSION['email'] = $fila['email'];
        $_SESSION['tipo'] = $fila['tipo'];

        // Redireccionar según el tipo de usuario
        if ($_SESSION['tipo'] == 'entrenador') {
            header('Location: gestioUsuaris.php');
        } else {
            header('Location: paginaPrincipal.html');
        }
    } else {
        echo 'Usuari o Contrasenya incorrectas';
    }
} else {
    echo 'Usuari o Contrasenya incorrectas';
}

$conn->close();
?>
