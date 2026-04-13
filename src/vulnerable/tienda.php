<?php
session_start();
$conn = new mysqli('db', 'user', 'password', 'demo');
$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Colonias</title>
    <link rel="stylesheet" href="../css/styles2.css">
</head>
<body>
    <div class="tienda-container">
        <header class="tienda-header">
            <h1>PerfumesPTL</h1>
            <p>Bienvenido a nuestra tienda</p>
        </header>

        <div class="productos-grid">
            <?php while ($producto = $resultado->fetch_assoc()): ?>
                <div class="producto-card">
                    <h2><?= $producto['nombre'] ?></h2>
                    <p><?= $producto['descripcion'] ?></p>
                    <span class="precio"><?= $producto['precio'] ?> €</span>
                    <button>Añadir al carrito</button>
                    <img src="../<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>">
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>