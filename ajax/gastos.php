<?php
session_start();
require "../modelos/gastos.php";

$gasto = new gastos();

switch ( $_GET[ "op" ] ) {
    case "listar":
    $respuesta = $gasto->listar();

    if ( $respuesta->num_rows > 0 ) {
      $datos = array();
      while ( $fila = $respuesta->fetch_row() ) {
        $datos[] = array(
          "Botones" => "<button class='boton-icono' name='btnEliminar' onClick='eliminar(" . $fila[ 0 ] . ")'><i class='fa-solid fa-trash-can'></i></button><button class='boton-icono' name='btnEditar' onClick='editar(\"" . $fila[ 0 ] . "*" . $fila[ 1 ] . "*" . $fila[ 2 ] . "*" . $fila[ 3 ] . "\")'><i class='fa-solid fa-pencil'></i></button>",
          "ID" => $fila[ 0 ],
          "Descripcion" => $fila[ 1 ],
          "Monto" => $fila[ 2 ],
          "Empleado" => $fila[ 3 ],
        );
      }
    }
    echo json_encode( array( "data" => $datos ) );
    break;
  case "IngresoGas":
    if ($_POST["id"] == ""){
      $id = "null";
    } else {
      $id = $_POST["id"];
    }
    $respuesta = $gasto->IngresoGas( $id, $_POST[ "descripcion" ], $_POST[ "monto" ], $_POST["empleados"] );
    $fila = $respuesta->fetch_row();
    echo $fila[0];
    break;
  case "EliminarGas":
    $respuesta = $gasto->eliminarGas( $_POST[ "id" ]);
    $fila = $respuesta->fetch_row();
    echo $fila[ 0 ];
    break;
}
?>
