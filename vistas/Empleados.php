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
    <a href="#">Empleados</a>
    <hr>
    <a href="Tareas.php">Tareas</a>
    <hr>
    <a href="Gastos.php">Gastos</a>
    <hr>
    <a href="Ventas.php">Ventas</a>
    <hr>
    <a href="Producto.php">Productos</a>
    <hr>
    <a href="../ajax/salir.php">Salir</a>
    <hr>
  </div>
  <div class="contenido">
    <button id="btnMostrarEmp" class="boton">Nuevo</button>
    <div id="formEmpDiv" style="display:none;">
      <form id="formEmp" name="formEmp">
        <p>Cedula:
          <input type="text" name="cedula" id="cedula" maxlength="10" oninput="validarNumero(this)">
        </p>
        <p>Nombre:
          <input type="text" name="nombre" id="nombre">
        </p>
        <p>Apellido:
          <input type="text" name="apellido" id="apellido">
        </p>
        <p>Cargo:
          <select id="cargo" name="cargo">
            <option value="gerente">Gerente</option>
            <option value="agricultor">Agricultor</option>
            <option value="contable">Contable</option>
            <option value="trabajador">Trabajador</option>
            <option value="veterinario">Veterinario</option>
            <option value="guardia">Guardia de seguridad</option>
          </select>
        </p>
        <p>Fecha Contratación:
          <input type="date" name="fechacon" id="fechacon">
        </p>
        <p>Salario:
          <input type="number" name="salario" id="salario">
        </p>
        <p>Usuario:
          <input type="text" name="usuario" id="usuario">
        </p>
        <p>Clave:
          <input type="password" name="clave" id="clave">
        </p>
        <button class="boton" type="submit" id="btnEnviarEmp" name="btnEnviarEmp">Crear</button>
        <button class="boton" type="reset" onClick="limpiar()">Limpiar</button>
      </form>
    </div>
    <div class="colorletratabla">
    <table id="Empleados" name="Empleados" class="tablas">
      <thead>
        <tr>
          <th>Cedula</th>
          <th>Nombre</th>
          <th>Cargo</th>
          <th>Contratación</th>
          <th>Salario</th>
          <th>Usuario</th>
          <th>Botones</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>
</body>
<script src="../files/jquery-3.7.1.min.js"></script>
<script src="../files/datatables.min.js"></script>
<script src="js/empleados.js"></script>
</html>
