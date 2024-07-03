<?php
session_start();
if ( $_SESSION[ "cargo" ] != "admin" ) {
  header( "Location: index.php" );
  exit();
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Hacienda</title>
<link rel="stylesheet" href="../files/estilos.css">
<link href="../files/fontawesome-free-6.5.1/css/fontawesome.css" rel="stylesheet">
<link href="../files/fontawesome-free-6.5.1/css/brands.css" rel="stylesheet">
<link href="../files/fontawesome-free-6.5.1/css/solid.css" rel="stylesheet">
</head>

<body>
<div class="contedor">
  <div class="menu-lateral">
    <h2>Bienvenido, <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']?></h2>
    <div class="icon-center"><i class="fa-solid fa-warehouse fa-5x"></i></div>
    <a href="#">Pagina Principal</a>
    <hr>
    <a href="Empleados.php">Empleados</a>
    <hr>
    <a href="Tareas.php">Tareas</a>
    <hr>
    <a href="Gastos.php">Gastos</a>
    <hr>
    <a href="Ventas.php">Ventas</a>
    <hr>
    <a href="Producto.php">Producto</a>
    <hr>
    <a href="../ajax/salir.php">Salir</a>
    <hr>
  </div>
  <div class="contenido">
    <h2>Bienvenido al sistema de hacienda</h2>
    <div class="icon-center"><i class="fa-solid fa-warehouse fa-10x"></i></div>
    <p>¿Tienes preguntas o necesitas ayuda? No dudes en ponerte en contacto con nosotros. Estamos disponibles para atender tus consultas y brindarte la asistencia que necesitas.</p>
  <address>
    <p>Dirección: Urcuqui</p>
    <p>Teléfono: +593 987654321</p>
    <p>Email: info@tuhacienda.com</p>
  </address>
  </div>
</div>
</body>
<script src="../files/jquery-3.7.1.min.js"></script>
</html>