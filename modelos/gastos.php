<?php
require( "../config/conexion.php" );
class gastos {
    function listar() {
    $sql = "call sp_Gastos(2, null, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }

  function IngresoGas($id, $descripcion, $monto, $empleado ) {
    $sql = "call sp_Gastos(1, $id, '$descripcion', $monto, $empleado)";
    return ejecutarConsultaSP( $sql ) ;
  }
  
  function eliminarGas( $id ) {
    $sql = "call sp_Gastos(3, $id, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }
}
?>