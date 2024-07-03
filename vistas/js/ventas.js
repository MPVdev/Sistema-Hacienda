$(document).ready(function () {

  $("#btnMostrarVen").click(function () {
    $("#formVenDiv").toggle();
    var texto = $("#formVen").is(":visible") ? "Ocultar" : "Nuevo";
    $("#btnMostrarVen").text(texto);
  });

  $("#formVen").on('submit', function (e) {
    Ingreso(e);
  });

  function Ingreso(e) {
    e.preventDefault();
    var formData = new FormData($("#formVen")[0]);
    $.ajax({
      url: "../ajax/ventas.php?op=IngresoVen",
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
        Verventas();
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
  
  mostrarProductos();
  
  function mostrarProductos() {
    var productos = document.getElementById("productos");
    $.ajax({
      url: "../ajax/productos.php?op=comboPro",
      type: "POST",
      contentType: false,
      processData: false,
      async: false,
      success: function (datos) {
        datos = datos.replace(/\\/g, '').replace(/"/g,'');
        productos.innerHTML = datos;
      }
    });
  }
  Verventas();

  function Verventas() {
    $('#ventas').DataTable().destroy();
    $('#ventas').DataTable({
      language: {
        url: "../files/datatable-spanish.json"
      },
      ajax: {
        url: "../ajax/ventas.php?op=listar",
        type: "POST",
        dataSrc: 'data'
      },
      columns: [{
          data: 'ID'
        },
        {
          data: 'Producto'
        },
        {
          data: 'Cantidad'
        },
        {
          data: 'Precio'
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

function Verventas() {
  $('#ventas').DataTable().destroy();
  $('#ventas').DataTable({
    language: {
      url: "../files/datatable-spanish.json"
    },
    ajax: {
      url: "../ajax/ventas.php?op=listar",
      type: "POST",
      dataSrc: 'data'
    },
    columns: [{
          data: 'ID'
        },
        {
          data: 'Producto'
        },
        {
          data: 'Cantidad'
        },
        {
          data: 'Precio'
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

function validarDecimal(input) {
  let valor = input.value.replace(/[^\d.]/g, '');
  valor = valor.replace(/(\..*)\./g, '$1');
  const partes = valor.split('.');
  if (partes.length > 1) {
    valor = `${partes[0]}.${partes[1].substring(0, 2)}`;
  }

  input.value = valor;
}


function eliminar(id) {
  $.ajax({
    type: "POST",
    url: "../ajax/ventas.php?op=EliminarVen",
    data: {
      id: id
    },
    success: function (datos) {
      if (datos === "1") {
        alert("eliminado exitosamente");
        Verventas();
      } else if (datos === "0") {
        alert("El usuario no existe");
      }
    }
  });
}

function editar(recibe) {
  $("#formVenDiv").show();
  var datos = recibe.split("*");
  $("#id").val(datos[0]);
  $("#productos").val(datos[1]);
  $("#cantidad").val(datos[2]);
  $("#precio").val(datos[3]);
  $("#empleados").val(datos[4]);
  $("#btnEnviarVen").text("Modificar");
  $("#btnMostrarVen").text("Ocultar");
}

function limpiar(){
  $("#btnEnviarVen").text("Crear");
}