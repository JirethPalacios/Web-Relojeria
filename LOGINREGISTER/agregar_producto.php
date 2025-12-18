<?php
session_start();

if(!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin'){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<div class="admin-header-box">
    <h2>Agregar Producto</h2>

    <div class="topbar-botones">
        <a href="admin.php" class="btn-volver">← Volver</a>
    </div>
</div>

<div class="form-container">
    <form method="POST" action="php/guardar_producto.php" enctype="multipart/form-data">

        <label>ID:</label>
        <input type="number" name="id" required>

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Piezas:</label>
        <input type="number" name="piezas" required>

        <label>Precio:</label>
        <input type="text" name="precio" required>

        <label>Imagen:</label>
        <input type="file" name="imagen" required>

        <button type="submit">Guardar Producto</button>
    </form>
</div>

</body>
</html>
