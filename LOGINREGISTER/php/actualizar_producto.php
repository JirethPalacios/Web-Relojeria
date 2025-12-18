<?php
session_start();

if(!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin'){
    header("Location: ../index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: ../admin.php");
    exit();
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$piezas = $_POST['piezas'];
$precio = $_POST['precio'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Producto actualizado</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<!-- RECTÁNGULO COLOR VINO CON BOTÓN -->
<div class="admin-header-box">
    <a href="../admin.php" class="btn-regresar-admin">
        ← Regresar al panel de administración
    </a>
</div>

<div style="width:95%; margin:auto;">
    <h3>Formulario recibido correctamente</h3>
    <p><strong>ID:</strong> <?php echo $id; ?></p>
    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Piezas:</strong> <?php echo $piezas; ?></p>
    <p><strong>Precio:</strong> <?php echo $precio; ?></p>
</div>

</body>
</html>
