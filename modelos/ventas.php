<?php
require( "../config/conexion.php" );
class ventas {
  function listar() {
    $sql = "call sp_Ventas(2, null, null, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }

  function IngresoVen( $id, $producto, $empleado, $cantidad, $precio ) {
    $sql = "call sp_Ventas(1, $id, $producto, $empleado, $cantidad, $precio)";
    return ejecutarConsultaSP( $sql );
  }

  function eliminarVen( $id ) {
    $sql = "call sp_Ventas(3, $id, null, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }
}
?>