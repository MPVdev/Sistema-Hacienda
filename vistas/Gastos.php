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
    <a href="#">Gastos</a>
    <hr>
    <a href="Ventas.php">Ventas</a>
    <hr>
    <a href="Producto.php">Productos</a>
    <hr>
    <a href="../ajax/salir.php">Salir</a>
    <hr>
  </div>
  <div class="contenido">
    <button class="boton" id="btnMostrarGas">Nuevo</button>
    <div id="formGasDiv" style="display:none;">
      <form id="formGas" name="formGas">
        <input type="text" id="id" name="id" style="display: none;">
        <p>Descripcion:
          <input type="text" id="descripcion" name="descripcion">
        </p>
        <p>Monto:
          <input type="text" id="monto" name="monto" oninput="validarNumero(this)">
        </p>
        <p>Empleado:
          <select id="empleados" name="empleados">
          </select>
        </p>
        <button class="boton" type="submit" id="btnEnviarGas" name="btnEnviarGas">Crear</button>
        <button class="boton" type="reset" onClick="limpiar()">Limpiar</button>
      </form>
    </div>
    <div class="colorletratabla">
      <table id="Gastos" name="Gastos" class="tablas">
        <thead>
          <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Monto</th>
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
<script src="js/gastos.js"></script>
</html>
