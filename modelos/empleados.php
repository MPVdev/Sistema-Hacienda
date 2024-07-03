<?php
require( "../config/conexion.php" );
class empleados {
  function logeo( $usuario, $clave ) {
    $sql = "call sp_Empleados(0, null, null, null, null, null, null, '$usuario', '$clave')";
    return ejecutarConsultaSP( $sql );
  }

  function listar() {
    $sql = "call sp_Empleados(2, null, null, null, null, null, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }

  function IngresoEmp( $cedula, $nombre, $apellido, $cargo, $fecha, $salario, $usuario, $clave ) {
    $sql = "call sp_Empleados(1, '$cedula', '$nombre', '$apellido', '$cargo', '$fecha', '$salario','$usuario', '$clave')";
    return ejecutarConsultaSP( $sql );
  }
  
  function eliminarEmp( $cedula ) {
    $sql = "call sp_Empleados(3, $cedula, null, null, null, null, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }
  function comboEmp() {
    $sql = "call sp_Empleados(4, null , null, null, null, null, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }
}
?>