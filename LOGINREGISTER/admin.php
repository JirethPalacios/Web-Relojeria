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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrador</title>

    <!-- CSS DEL ADMIN -->
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<div class="admin-header-box">
    <h2>Gestión de Productos</h2>

    <div class="topbar-botones">
        <a href="agregar_producto.php" class="btn-agregar">+ Agregar producto</a>
        <a href="php/cerrar_sesion.php" class="btn-cerrar">Cerrar sesión</a>
    </div>
</div>

<table class="tabla-productos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Piezas</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>1</td>
            <td>
                <img src="assets/imagenes/boxengasse.png" width="60">
            </td>
            <td>Box Engasse</td>
            <td>25</td>
            <td>$15,000</td>
            <td>
               <a href="editar_producto.php?id=1" class="btn-editar">Editar</a>
                <button class="btn-eliminar">Eliminar</button>
            </td>
        </tr>

        <tr>
            <td>2</td>
            <td>
                <img src="assets/imagenes/englishrose.png" width="60">
            </td>
            <td>English Horse</td>
            <td>18</td>
            <td>$25,000</td>
            <td>
                <button class="btn-editar">Editar</button>
                <button class="btn-eliminar">Eliminar</button>
            </td>
        </tr>
    </tbody>
</table>



</html>
