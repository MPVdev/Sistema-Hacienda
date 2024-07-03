<?php
session_start();
require "../modelos/tareas.php";

$tarea = new tareas();

switch ( $_GET[ "op" ] ) {
  case "listar":
    $respuesta = $tarea->listar();

    if ( $respuesta->num_rows > 0 ) {
      $datos = array();
      while ( $fila = $respuesta->fetch_row() ) {
        $datos[] = array(
          "Botones" => "<button class='boton-icono' name='btnEliminar' onClick='eliminar(" . $fila[ 0 ] . ")'><i class='fa-solid fa-trash-can'></i></button><button class='boton-icono' name='btnEditar' onClick='editar(\"" . $fila[ 0 ] . "*" . $fila[ 1 ] . "*" . $fila[ 2 ] . "*" . $fila[ 3 ] . "*" . $fila[ 4 ] . "\")'><i class='fa-solid fa-pencil'></i></button>",
          "ID" => $fila[ 0 ],
          "Descripcion" => $fila[ 1 ],
          "Fecha" => $fila[ 2 ],
          "Estado" => $fila[ 3 ],
          "Empleado" => $fila[ 4 ],
        );
      }
    }
    echo json_encode( array( "data" => $datos ) );
    break;
  case "IngresoTar":
    if ( $_POST[ "id" ] == "" ) {
      $id = "null";
    } else {
      $id = $_POST[ "id" ];
    }
    $respuesta = $tarea->IngresoTar( $id, $_POST[ "descripcion" ], $_POST[ "fecha" ], $_POST[ "estado" ], $_POST[ "empleados" ] );
    $fila = $respuesta->fetch_row();
    echo $fila[ 0 ];
    break;
  case "EliminarTar":
    $respuesta = $tarea->eliminarTar( $_POST[ "id" ] );
    $fila = $respuesta->fetch_row();
    echo $fila[ 0 ];
    break;
}
?>
