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
    <title>Panel Admin</title>
    <link rel="stylesheet" href="../css/styles3.css">
</head>
<body>
    <div class="tienda-container">
        <header class="tienda-header">
            <div>
                <h1>⚙️ Panel de Administracion</h1>
                <p>Gestiona los productos de la tienda</p>
            </div>
            <span class="admin-badge">🔐 Administrador</span>
        </header>

        <div class="productos-grid">
            <?php while ($producto = $resultado->fetch_assoc()): ?>
                <div class="producto-card">
                    <img src="../<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>">
                    <h2><?= $producto['nombre'] ?></h2>
                    <p><?= $producto['descripcion'] ?></p>
                    <form method="POST" action="actualizar.php">
                        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                        <div class="campo-admin">
                            <label>Precio (€)</label>
                            <input type="number" name="precio" value="<?= $producto['precio'] ?>" step="0.01">
                        </div>
                        <div class="campo-admin">
                            <label>Stock</label>
                            <input type="number" name="stock" value="<?= $producto['stock'] ?>">
                        </div>
                        <button type="submit" class="btn-guardar">Guardar cambios</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>