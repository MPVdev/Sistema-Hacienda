<?php
require( "../config/conexion.php" );
class tareas {
  function listar() {
    $sql = "call sp_Tareas(2, null, null, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }

  function IngresoTar( $id, $descripcion, $fecha, $estado, $empleado ) {
    $sql = "call sp_Tareas(1, $id, '$descripcion', '$fecha', '$estado', $empleado)";
    return ejecutarConsultaSP( $sql );
  }

  function eliminarTar( $id ) {
    $sql = "call sp_Tareas(3, $id, null, null, null, null)";
    return ejecutarConsultaSP( $sql );
  }
}
?>