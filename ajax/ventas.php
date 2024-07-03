<?php
session_start();
require "../modelos/ventas.php";

$venta = new ventas();

switch ( $_GET[ "op" ] ) {
  case "listar":
    $respuesta = $venta->listar();

    if ( $respuesta->num_rows > 0 ) {
      $datos = array();
      while ( $fila = $respuesta->fetch_row() ) {
        $datos[] = array(
          "Botones" => "<button class='boton-icono' name='btnEliminar' onClick='eliminar(" . $fila[ 0 ] . ")'><i class='fa-solid fa-trash-can'></i></button><button class='boton-icono' name='btnEditar' onClick='editar(\"" . $fila[ 0 ] . "*" . $fila[ 5 ] . "*" . $fila[ 1 ] . "*" . $fila[ 2 ] . "*" . $fila[ 6 ] . "\")'><i class='fa-solid fa-pencil'></i></button>",
          "ID" => $fila[ 0 ],
          "Producto" => $fila[ 4 ],
          "Cantidad" => $fila[ 1 ],
          "Precio" => $fila[ 2 ],
          "Empleado" => $fila[ 3 ],
        );
      }
    }
    echo json_encode( array( "data" => $datos ) );
    break;
  case "IngresoVen":
    if ( $_POST[ "id" ] == "" ) {
      $id = "null";
    } else {
      $id = $_POST[ "id" ];
    }
    $respuesta = $venta->IngresoVen( $id, $_POST[ "productos" ], $_POST[ "empleados" ], $_POST[ "cantidad" ], $_POST[ "precio" ] );
    $fila = $respuesta->fetch_row();
    echo $fila[ 0 ];
    break;
  case "EliminarVen":
    $respuesta = $venta->eliminarVen( $_POST[ "id" ] );
    $fila = $respuesta->fetch_row();
    echo $fila[ 0 ];
    break;
}
?>
