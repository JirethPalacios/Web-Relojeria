<?php
session_start();

// VALIDACIÓN DE SESIÓN Y ROL (CLIENTE)
if (!isset($_SESSION['usuario']) || !isset($_SESSION['rol']) || $_SESSION['rol'] !== 'cliente') {
    echo '
    <script>
        alert("Acceso no autorizado");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Relojes | Bienvenido</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/estilos_carrito.css">
</head>

<body>
<header>
    <h1>Tienda de Relojes</h1>
    <a href="php/cerrar_sesion.php" style="
        position: absolute; 
        top: 10px; 
        right: 20px; 
        color: #fff; 
        text-decoration: none;
        font-size: 16px;
        z-index: 99;">Cerrar sesión</a>
</header>

<section class="contenedor">
<div class="contenedor-items">

<?php
$productos = [
    ["Box Engasse","boxengasse.png","$15.000"],
    ["English Horse","englishrose.png","$25.000"],
    ["Knock Nap","knocknap.png","$35.000"],
    ["La Night","lanight.png","$18.000"],
    ["Silver All","silverall.png","$32.000"],
    ["Skin Glam","skinglam.png","$18.000"],
    ["Midimix","midimix.png","$54.000"],
    ["Sir Blue","sirblue.png","$32.000"],
    ["Middlesteel","middlesteel.png","$42.800"]
];

foreach ($productos as $p) {
    echo '
    <div class="item">
        <span class="titulo-item">'.$p[0].'</span>
        <img src="assets/imagenes/'.$p[1].'" class="img-item">
        <span class="precio-item">'.$p[2].'</span>
        <button type="button" class="boton-item">Agregar al Carrito</button>
    </div>';
}
?>

</div>

<!-- CARRITO -->
<div class="carrito" id="carrito">
    <div class="header-carrito">
        <h2>Tu Carrito</h2>
    </div>

    <div class="carrito-items"></div>

    <div class="carrito-total">
        <div class="fila">
            <strong>Tu Total</strong>
            <span class="carrito-precio-total">$0,00</span>
        </div>

        <div class="metodo-pago">
            <h4>Método de pago</h4>

            <label>
                <input type="radio" name="metodoPago" value="Tarjeta">
                Tarjeta
            </label><br>

            <label>
                <input type="radio" name="metodoPago" value="Efectivo">
                Efectivo
            </label>
        </div>

        <a href="javascript:void(0);" class="btn-pagar">
            Pagar <i class="fa-solid fa-bag-shopping"></i>
        </a>
    </div>
</div>
</section>

<!-- MODAL -->
<div id="modalPago" class="modal" style="display:none;">
    <div class="modal-contenido">
        <h2>Su pago ha sido completado</h2>
        <p>Gracias por su compra</p>
        <button type="button" id="cerrarModal">Cerrar</button>
    </div>
</div>

<script src="assets/js/app_carrito.js"></script>
</body>
</html>
