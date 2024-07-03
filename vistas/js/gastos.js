$(document).ready(function () {

  $("#btnMostrarGas").click(function () {
    $("#formGasDiv").toggle();
    var texto = $("#formGas").is(":visible") ? "Ocultar" : "Nuevo";
    $("#btnMostrarGas").text(texto);
  });

  $("#formGas").on('submit', function (e) {
    Ingreso(e);
  });

  function Ingreso(e) {
    e.preventDefault();
    var formData = new FormData($("#formGas")[0]);
    $.ajax({
      url: "../ajax/gastos.php?op=IngresoGas",
      type: "POST",
      contentType: false,
      processData: false,
      async: false,
      data: formData,
      success: function (datos) {
        if (datos === "1") {
          alert("Guardado exitosamente");
        } else if (datos === "0") {
          alert("Se modifico correctamente");
        }
        VerGastos();
      }
    });
  }
  
  mostrarEmpleados();
  
  function mostrarEmpleados() {
    var empleados = document.getElementById("empleados");
    $.ajax({
      url: "../ajax/empleados.php?op=comboEmp",
      type: "POST",
      contentType: false,
      processData: false,
      async: false,
      success: function (datos) {
        datos = datos.replace(/\\/g, '').replace(/"/g,'');
        empleados.innerHTML = datos;
      }
    });
  }
  
  VerGastos();

  function VerGastos() {
    $('#Gastos').DataTable().destroy();
    $('#Gastos').DataTable({
      language: {
        url: "../files/datatable-spanish.json"
      },
      ajax: {
        url: "../ajax/gastos.php?op=listar",
        type: "POST",
        dataSrc: 'data'
      },
      columns: [{
          data: 'ID'
        },
        {
          data: 'Descripcion'
        },
        {
          data: 'Monto'
        },
        {
          data: 'Empleado'
        },
        {
          data: 'Botones'
        },
      ]
    });
  }
});

function VerGastos() {
  $('#Gastos').DataTable().destroy();
  $('#Gastos').DataTable({
    language: {
      url: "../files/datatable-spanish.json"
    },
    ajax: {
      url: "../ajax/gastos.php?op=listar",
      type: "POST",
      dataSrc: 'data'
    },
    columns: [{
        data: 'ID'
      },
      {
        data: 'Descripcion'
      },
      {
        data: 'Monto'
      },
      {
        data: 'Empleado'
      },
      {
        data: 'Botones'
      },
    ]
  });
}

function validarNumero(input) {
  let valor = input.value.replace(/\D/g, '').substring(0, 10);
  input.value = valor;
}

function eliminar(id) {
  $.ajax({
    type: "POST",
    url: "../ajax/gastos.php?op=EliminarGas",
    data: {
      id: id
    },
    success: function (datos) {
      if (datos === "1") {
        alert("eliminado exitosamente");
        VerGastos();
      } else if (datos === "0") {
        alert("El usuario no existe");
      }
    }
  });
}

function editar(recibe) {
  $("#formGasDiv").show();
  var datos = recibe.split("*");
  $("#id").val(datos[0]);
  $("#cedula").prop("readonly", true);
  $("#descripcion").val(datos[1]);
  $("#monto").val(datos[2]);
  $("#empleado").val(datos[3]);
  $("#btnEnviarGas").text("Modificar");
  $("#btnMostrarGas").text("Ocultar");
}

function limpiar(){
  $("#btnEnviarGas").text("Crear");
}