$(document).ready(function () {

  $("#btnMostrarEmp").click(function () {
    $("#formEmpDiv").toggle();
    var texto = $("#formEmp").is(":visible") ? "Ocultar" : "Nuevo";
    $("#btnMostrarEmp").text(texto);
  });

  $("#formEmp").on('submit', function (e) {
    Ingreso(e);
  });

  function Ingreso(e) {
    e.preventDefault();
    var formData = new FormData($("#formEmp")[0]);
    $.ajax({
      url: "../ajax/empleados.php?op=IngresoEmp",
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
        VerEmpleados();
      }
    });
  }

  VerEmpleados();

  function VerEmpleados() {
    $('#Empleados').DataTable().destroy();
    $('#Empleados').DataTable({
      language: {
        url: "../files/datatable-spanish.json"
      },
      ajax: {
        url: "../ajax/empleados.php?op=listar",
        type: "POST",
        dataSrc: 'data'
      },
      columns: [{
          data: 'Cedula'
        },
        {
          data: 'Nombre'
        },
        {
          data: 'Cargo'
        },
        {
          data: 'Fecha'
        },
        {
          data: 'Salario'
        },
        {
          data: 'Usuario'
        },
        {
          data: 'Botones'
        },
      ]
    });
  }
});

function VerEmpleados() {
  $('#Empleados').DataTable().destroy();
  $('#Empleados').DataTable({
    language: {
      url: "../files/datatable-spanish.json"
    },
    ajax: {
      url: "../ajax/empleados.php?op=listar",
      type: "POST",
      dataSrc: 'data'
    },
    columns: [{
        data: 'Cedula'
      },
      {
        data: 'Nombre'
      },
      {
        data: 'Cargo'
      },
      {
        data: 'Fecha'
      },
      {
        data: 'Salario'
      },
      {
        data: 'Usuario'
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

function eliminar(cedula) {
  $.ajax({
    type: "POST",
    url: "../ajax/empleados.php?op=EliminarEmp",
    data: {
      cedula: cedula
    },
    success: function (datos) {
      if (datos === "1") {
        alert("eliminado exitosamente");
        VerEmpleados();
      } else if (datos === "0") {
        alert("El usuario no existe");
      }
    }
  });
}

function editar(recibe) {
  $("#formEmpDiv").show();
  var datos = recibe.split("*");
  $("#cedula").val(datos[0]);
  $("#cedula").prop("readonly", true);
  $("#nombre").val(datos[1]);
  $("#apellido").val(datos[2]);
  $("#cargo").val(datos[3]);
  $("#fechacon").val(datos[4]);
  $("#salario").val(datos[5]);
  $("#usuario").val(datos[6]);
  $("#btnEnviarEmp").text("Modificar");
  $("#btnMostrarEmp").text("Ocultar");
}

function limpiar() {
  $("#btnEnviarEmp").text("Crear");
}
