<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login Seguro</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <div class="card">
    <h1>Bienvenido</h1>
    <p class="subtitulo">Versión segura del login</p>

    <?php if (isset($mensaje) && $mensaje !== ''): ?>
      <div class="<?= strpos($mensaje, 'Acceso') !== false ? 'mensaje-ok' : 'mensaje-error' ?>">
        <?= $mensaje ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="index_seguro.php">
      <div class="campo">
        <label>Usuario</label>
        <input type="text" name="username" placeholder="Escribe tu usuario" autofocus>
      </div>
      <div class="campo">
        <label>Contraseña</label>
        <input type="password" name="password" placeholder="••••••••">
      </div>
      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>