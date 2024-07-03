<?php
require( "../config/conexion.php" );
class productos {
  function listar() {
    $sql = "call sp_Productos(2, null, null, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }

  function IngresoPro( $id, $descripcion, $tipo, $estado, $inventario ) {
    $sql = "call sp_Productos(1, $id, '$tipo', '$descripcion', '$estado', $inventario)";
    return ejecutarConsultaSP( $sql );
  }

  function eliminarPro( $id ) {
    $sql = "call sp_Productos(3, $id, null, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }

  function comboInv() {
    $sql = "call sp_Productos(4, null , null, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }
}
?>