<?php
$mensaje = ''; //Inicializamos la variable mensaje para evitar errores de variable no definida

$conn = new mysqli('db', 'user', 'password', 'demo');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        if ($fila['role'] === 'admin') {
    header('Location: admin.php');
} else {
    header('Location: tienda.php');
}
exit();
        
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
    }
}

include 'login.php'; // Incluimos el archivo de la interfaz de usuario
?>