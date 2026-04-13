<?php
session_start();
$conn = new mysqli('db', 'user', 'password', 'demo');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = $_POST['id'];
    $precio = $_POST['precio'];
    $stock  = $_POST['stock'];

    $sql = "UPDATE productos SET precio = '$precio', stock = '$stock' WHERE id = '$id'";
    $conn->query($sql);
}

header('Location: admin.php');
exit();
?>