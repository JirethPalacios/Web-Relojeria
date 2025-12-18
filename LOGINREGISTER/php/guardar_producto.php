<?php
session_start();

if(!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin'){
    header("Location: ../index.php");
    exit();
}

echo "<h3>Producto agregado correctamente</h3>";
echo "ID: " . $_POST['id'] . "<br>";
echo "Nombre: " . $_POST['nombre'] . "<br>";
echo "Piezas: " . $_POST['piezas'] . "<br>";
echo "Precio: " . $_POST['precio'] . "<br>";

echo '<br><a href="../admin.php">← Volver al panel</a>';
