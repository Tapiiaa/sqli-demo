<?php
$conn = new mysqli('db', 'user', 'password', 'demo');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$usuarios = [
    ['admin', 'contraseniasecreta123', 'admin'],
    ['Pedro', 'pedro123', 'user'],
    ['Claudia', 'claudia123', 'user'],
    ['Patrik', 'patrik123', 'user']
];

foreach ($usuarios as $u) {
    $username = $u[0];
    $password = password_hash($u[1], PASSWORD_BCRYPT);
    $role     = $u[2];

    $stmt = $conn->prepare("INSERT INTO users_seguro (username, password, role) VALUES (?, ?, ?)");
    
    if (!$stmt) {
        echo "Error preparando query: " . $conn->error . "<br>";
        continue;
    }
    
    $stmt->bind_param("sss", $username, $password, $role);
    
    if ($stmt->execute()) {
        echo "Usuario $username registrado correctamente<br>";
    } else {
        echo "Error insertando $username: " . $stmt->error . "<br>";
    }
}
?>