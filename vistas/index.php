<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Hacienda</title>
<link href="../files/estilos.css" rel="stylesheet">
<link href="../files/fontawesome-free-6.5.1/css/fontawesome.css" rel="stylesheet">
<link href="../files/fontawesome-free-6.5.1/css/brands.css" rel="stylesheet">
<link href="../files/fontawesome-free-6.5.1/css/solid.css" rel="stylesheet">
</head>

<body class="Logeo-body">
<h2>INGRESO AL SISTEMA</h2>
<div class="ingreso"> <i class="fa-solid fa-user fa-5x" style="color: black"></i>
  <form id="formlogeo" name="formlogeo">
    <p>Usuario: admin
      <input type="text" id="usuario" name="usuario" required>
    </p>
    <p>Clave: admin
      <input type="password" id="clave" name="clave" required>
    </p>
    <button class="boton" name="btningresar" type="submit">Entrar</button>
  </form>
</div>
</body>
<script src="../files/jquery-3.7.1.min.js"></script>
<script src="js/logeo.js"></script>
</html>
