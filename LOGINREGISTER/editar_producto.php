<?php
session_start();

if(!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin'){
    echo '
    <script>
        alert("Acceso denegado");
        window.location = "index.php";
    </script>
    ';
    session_destroy();
    die();
}

// Obtener el ID desde la URL
$id = $_GET['id'] ?? null;

if(!$id){
    echo '
    <script>
        alert("Producto no válido");
        window.location = "admin.php";
    </script>
    ';
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>

<div class="admin-topbar">
    <h2>Editar Producto</h2>

    <div class="topbar-botones">
        <a href="admin.php" class="btn-volver">← Volver</a>
        <a href="php/cerrar_sesion.php" class="btn-cerrar">Cerrar sesión</a>
    </div>
</div>


<div class="form-container">
    <form method="POST" action="php/actualizar_producto.php" enctype="multipart/form-data">

        
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="Box Engasse" required>

        <label>Piezas:</label>
        <input type="number" name="piezas" value="25" required>

        <label>Precio:</label>
        <input type="text" name="precio" value="15000" required>

        <label>Imagen:</label>
        <input type="file" name="imagen">

        <button type="submit">Guardar Cambios</button>
    </form>
</div>

</body>
</html>
