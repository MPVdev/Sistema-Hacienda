<?php
session_start();
require "../modelos/productos.php";

$producto = new productos();

switch ( $_GET[ "op" ] ) {
  case "listar":
    $respuesta = $producto->listar();

    if ( $respuesta->num_rows > 0 ) {
      $datos = array();
      while ( $fila = $respuesta->fetch_row() ) {
        $datos[] = array(
          "Botones" => "<button class='boton-icono' name='btnEliminar' onClick='eliminar(" . $fila[ 0 ] . ")'><i class='fa-solid fa-trash-can'></i></button><button class='boton-icono' name='btnEditar' onClick='editar(\"" . $fila[ 0 ] . "*" . $fila[ 1 ] . "*" . $fila[ 2 ] . "*" . $fila[ 3 ] . "*" . $fila[ 4 ] . "\")'><i class='fa-solid fa-pencil'></i></button>",
          "ID" => $fila[ 0 ],
          "Tipo" => $fila[ 1 ],
          "Descripcion" => $fila[ 2 ],
          "Estado" => $fila[ 3 ],
          "Inventario" => $fila[ 4 ],
        );
      }
    }
    echo json_encode( array( "data" => $datos ) );
    break;
  case "IngresoPro":
    if ( $_POST[ "id" ] == "" ) {
      $id = "null";
    } else {
      $id = $_POST[ "id" ];
    }
    $respuesta = $producto->IngresoPro( $id, $_POST[ "tipo" ], $_POST[ "descripcion" ], $_POST[ "estado" ], $_POST[ "inventario" ] );
    $fila = $respuesta->fetch_row();
    echo $fila[ 0 ];
    break;
  case "EliminarPro":
    $respuesta = $producto->eliminarPro( $_POST[ "id" ] );
    $fila = $respuesta->fetch_row();
    echo $fila[ 0 ];
    break;
    case "comboInv":
    $respuesta = $producto->comboInv();
    if ( $respuesta->num_rows > 0 ) {
      $combo = "";
      while ( $fila = $respuesta->fetch_row() ) {
        $combo .= "<option value='$fila[0]'>$fila[0]</option>";
      }
    }
     echo json_encode($combo);
    break;
    case "comboPro":
    $respuesta = $producto->listar();
    if ( $respuesta->num_rows > 0 ) {
      $combo = "";
      while ( $fila = $respuesta->fetch_row() ) {
        $combo .= "<option value='$fila[0]'>$fila[1]"."-"."$fila[2]</option>";
      }
    }
     echo json_encode($combo);
    break;
}
?>
