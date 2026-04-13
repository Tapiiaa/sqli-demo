<?php
$conn = new mysqli('db', 'user', 'password', 'demo');
$mensaje = '';
$username = '';
$password = '';
$es_ataque = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sospechoso = ["'", "--", "OR", "UNION", "SELECT", "DROP", "#"];

    foreach ($sospechoso as $patron) {
        if (stripos($username, $patron) !== false || stripos($password, $patron) !== false) {
            $es_ataque = true;
            break;
        }
    }

    if ($es_ataque) {
        $mensaje = "🛡️ Estamos bien protegidos. ¡Gracias por intentarlo!";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users_seguro WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            if (password_verify($password, $fila['password'])) {
                if ($fila['role'] === 'admin') {
                    header('Location: /vulnerable/admin.php');
                } else {
                    header('Location: /vulnerable/tienda.php');
                }
                exit();
            }
        }
        $mensaje = "Usuario o contraseña incorrectos.";
    }
}

include '../seguro/login_seguro.php';
?>