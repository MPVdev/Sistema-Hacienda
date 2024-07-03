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
<link href="../files/datatables.min.css" rel="stylesheet">
<link href="../files/fontawesome-free-6.5.1/css/fontawesome.css" rel="stylesheet">
<link href="../files/fontawesome-free-6.5.1/css/brands.css" rel="stylesheet">
<link href="../files/fontawesome-free-6.5.1/css/solid.css" rel="stylesheet">
</head>
<body>
<div class="contedor">
  <div class="menu-lateral">
    <h2>Bienvenido, <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']?></h2>
    <div class="icon-center"><i class="fa-solid fa-warehouse fa-5x"></i></div>
    <a href="home.php">Pagina Principal</a>
    <hr>
    <a href="Empleados.php">Empleados</a>
    <hr>
    <a href="Tareas.php">Tareas</a>
    <hr>
    <a href="Gastos.php">Gastos</a>
    <hr>
    <a href="#">Ventas</a>
    <hr>
    <a href="Producto.php">Productos</a>
    <hr>
    <a href="../ajax/salir.php">Salir</a>
    <hr>
  </div>
  <div class="contenido">
    <button class="boton" id="btnMostrarVen">Nuevo</button>
    <div id="formVenDiv" style="display:none;">
      <form id="formVen" name="formVen">
        <input type="text" id="id" name="id" style="display: none;">
        <p>Producto:
          <select id="productos" name="productos">
          </select>
        </p>
        <p>Cantidad:
          <input type="text" id="cantidad" name="cantidad" oninput="validarNumero(this)">
        </p>
        <p>Precio U:
          <input type="text" id="precio" name="precio" oninput="validarDecimal(this)">
        </p>
        <p>Empleado:
          <select id="empleados" name="empleados">
          </select>
        </p>
        <button class="boton" type="submit" id="btnEnviarVen" name="btnEnviarVen">Crear</button>
        <button class="boton" type="reset" onClick="limpiar()">Limpiar</button>
      </form>
    </div>
    <div class="colorletratabla">
      <table id="ventas" name="ventas" class="tablas">
        <thead>
          <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Empleado</th>
            <th>Botones</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
<script src="../files/jquery-3.7.1.min.js"></script>
<script src="../files/datatables.min.js"></script>
<script src="js/ventas.js"></script>
</html>
