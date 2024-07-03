$(document).ready(function () {

  $("#btnMostrarTar").click(function () {
    $("#formTarDiv").toggle();
    var texto = $("#formTar").is(":visible") ? "Ocultar" : "Nuevo";
    $("#btnMostrarTar").text(texto);
  });

  $("#formTar").on('submit', function (e) {
    Ingreso(e);
  });

  function Ingreso(e) {
    e.preventDefault();
    var formData = new FormData($("#formTar")[0]);
    $.ajax({
      url: "../ajax/tareas.php?op=IngresoTar",
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
        Vertareas();
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
        datos = datos.replace(/\\/g, '').replace(/"/g, '');
        empleados.innerHTML = datos;
      }
    });
  }

  Vertareas();

  function Vertareas() {
    $('#tareas').DataTable().destroy();
    $('#tareas').DataTable({
      language: {
        url: "../files/datatable-spanish.json"
      },
      ajax: {
        url: "../ajax/tareas.php?op=listar",
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
          data: 'Fecha'
        },
        {
          data: 'Estado'
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

function Vertareas() {
  $('#tareas').DataTable().destroy();
  $('#tareas').DataTable({
    language: {
      url: "../files/datatable-spanish.json"
    },
    ajax: {
      url: "../ajax/tareas.php?op=listar",
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
        data: 'Fecha'
      },
      {
        data: 'Estado'
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
    url: "../ajax/tareas.php?op=EliminarTar",
    data: {
      id: id
    },
    success: function (datos) {
      if (datos === "1") {
        alert("eliminado exitosamente");
        Vertareas();
      } else if (datos === "0") {
        alert("El usuario no existe");
      }
    }
  });
}

function editar(recibe) {
  $("#formTarDiv").show();
  var datos = recibe.split("*");
  $("#id").val(datos[0]);
  $("#descripcion").val(datos[1]);
  $("#fecha").val(datos[2]);
  $("#estado").val(datos[3])
  $("#empleado").val(datos[4]);
  $("#btnEnviarTar").text("Modificar");
  $("#btnMostrarTar").text("Ocultar");
}

function limpiar(){
  $("#btnEnviarTar").text("Crear");
}