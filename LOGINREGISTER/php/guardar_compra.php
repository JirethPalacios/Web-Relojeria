<?php
session_start();
require_once "conexion_be.php";

header('Content-Type: application/json');

// Verificar sesión
if (!isset($_SESSION['usuario'])) {
    echo json_encode(["success" => false, "msg" => "No autenticado"]);
    exit;
}

// Obtener ID del usuario
$correo = $_SESSION['usuario'];
$queryUsuario = "SELECT id FROM usuarios WHERE correo = '$correo'";
$resultUsuario = mysqli_query($conexion, $queryUsuario);
$usuario = mysqli_fetch_assoc($resultUsuario);

$id_usuario = $usuario['id'];

// Leer JSON
$data = json_decode(file_get_contents("php://input"), true);
$metodo_pago = $data['metodo_pago'];
$productos = $data['productos'];

// Insertar COMPRA
$queryCompra = "INSERT INTO compras (id_usuario, metodo_pago) 
                VALUES ($id_usuario, '$metodo_pago')";
mysqli_query($conexion, $queryCompra);

$id_compra = mysqli_insert_id($conexion);

// Insertar PRODUCTOS
foreach ($productos as $p) {
    $producto = $p['nombre'];
    $precio = $p['precio'];
    $cantidad = $p['cantidad'];
    $imagen = $p['imagen'];

    $queryDetalle = "INSERT INTO detalle_compra 
        (id_compra, producto, precio, cantidad, imagen)
        VALUES ($id_compra, '$producto', $precio, $cantidad, '$imagen')";

    mysqli_query($conexion, $queryDetalle);
}

echo json_encode(["success" => true]);
