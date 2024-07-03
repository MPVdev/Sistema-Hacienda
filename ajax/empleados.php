<?php
session_start();
require "../modelos/empleados.php";

$empleado = new empleados();

switch ( $_GET[ "op" ] ) {
  case "logeo":
    $respuesta = $empleado->logeo( $_POST[ "usuario" ], $_POST[ "clave" ] );
    $fila = $respuesta->fetch_row();

    if ( $fila ) {
      $_SESSION[ "cedula" ] = $fila[ 0 ];
      $_SESSION[ "nombre" ] = $fila[ 1 ];
      $_SESSION[ "apellido" ] = $fila[ 2 ];
      $_SESSION[ "cargo" ] = $fila[ 3 ];

      if ( $fila[ 3 ] == "admin" ) {
        echo 0;
      } else {
        echo 1;
      }
    } else {
      echo 2;
    }
    break;
    case "listar":
    $respuesta = $empleado->listar();

    if ( $respuesta->num_rows > 0 ) {
      $datos = array();
      while ( $fila = $respuesta->fetch_row() ) {
        $datos[] = array(
          "Botones" => "<button class='boton-icono' name='btnEliminar' onClick='eliminar(" . $fila[ 0 ] . ")'><i class='fa-solid fa-trash-can'></i></button><button class='boton-icono' name='btnEditar' onClick='editar(\"" . $fila[ 0 ] . "*" . $fila[ 1 ] . "*" . $fila[ 2 ] . "*" . $fila[ 3 ] . "*" . $fila[ 4 ] . "*" . $fila[ 5 ] . "*" . $fila[ 6 ] . "\")'><i class='fa-solid fa-pencil'></i></button>",
          "Nombre" => $fila[ 1 ]. " " . $fila[ 2 ],
          "Cargo" => $fila[ 3 ],
          "Fecha" => $fila[ 4 ],
          "Salario" => $fila[ 5 ],
          "Usuario" => $fila[ 6 ],
          "Cedula" => $fila[ 0 ],
        );
      }
    }
    echo json_encode( array( "data" => $datos ) );
    break;
  case "IngresoEmp":
    $respuesta = $empleado->ingresoEmp( $_POST[ "cedula" ], $_POST[ "nombre" ], $_POST[ "apellido" ], $_POST["cargo"],$_POST["fechacon"],$_POST["salario"], $_POST[ "usuario" ], $_POST[ "clave" ] );
    $fila = $respuesta->fetch_row();
    echo $fila[ 0 ];
    break;
  case "EliminarEmp":
    $respuesta = $empleado->eliminarEmp( $_POST[ "cedula" ]);
    $fila = $respuesta->fetch_row();
    echo $fila[ 0 ];
    break;
  case "comboEmp":
    $respuesta = $empleado->comboEmp();
    if ( $respuesta->num_rows > 0 ) {
      $combo = "";
      while ( $fila = $respuesta->fetch_row() ) {
        $combo .= "<option value='$fila[0]'>$fila[1]</option>";
      }
    }
     echo json_encode($combo);
    break;
}
?>
