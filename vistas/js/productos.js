$(document).ready(function () {

  $("#btnMostrarPro").click(function () {
    $("#formProDiv").toggle();
    var texto = $("#formPro").is(":visible") ? "Ocultar" : "Nuevo";
    $("#btnMostrarPro").text(texto);
  });

  $("#formPro").on('submit', function (e) {
    Ingreso(e);
  });

  function Ingreso(e) {
    e.preventDefault();
    var formData = new FormData($("#formPro")[0]);
    $.ajax({
      url: "../ajax/productos.php?op=IngresoPro",
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
        Verproductos();
      }
    });
  }
  
  mostrarinventarios();
  
  function mostrarinventarios() {
    var inventario = document.getElementById("inventario");
    $.ajax({
      url: "../ajax/productos.php?op=comboInv",
      type: "POST",
      contentType: false,
      processData: false,
      async: false,
      success: function (datos) {
        datos = datos.replace(/\\/g, '').replace(/"/g,'');
        inventario.innerHTML = datos;
      }
    });
  }
  
  Verproductos();

  function Verproductos() {
    $('#productos').DataTable().destroy();
    $('#productos').DataTable({
      language: {
        url: "../files/datatable-spanish.json"
      },
      ajax: {
        url: "../ajax/productos.php?op=listar",
        type: "POST",
        dataSrc: 'data'
      },
      columns: [{
          data: 'ID'
        },
                {
          data: 'Tipo'
        },
        {
          data: 'Descripcion'
        },
        {
          data: 'Estado'
        },
        {
          data: 'Inventario'
        },
        {
          data: 'Botones'
        },
      ]
    });
  }
});

function Verproductos() {
  $('#productos').DataTable().destroy();
  $('#productos').DataTable({
    language: {
      url: "../files/datatable-spanish.json"
    },
    ajax: {
      url: "../ajax/productos.php?op=listar",
      type: "POST",
      dataSrc: 'data'
    },
    columns: [{
          data: 'ID'
        },
                {
          data: 'Tipo'
        },
        {
          data: 'Descripcion'
        },
        {
          data: 'Estado'
        },
        {
          data: 'Inventario'
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
    url: "../ajax/productos.php?op=EliminarPro",
    data: {
      id: id
    },
    success: function (datos) {
      if (datos === "1") {
        alert("eliminado exitosamente");
        Verproductos();
      } else if (datos === "0") {
        alert("El usuario no existe");
      }
    }
  });
}

function editar(recibe) {
  $("#formProDiv").show();
  var datos = recibe.split("*");
  $("#id").val(datos[0]);
  $("#tipo").val(datos[1])
  $("#descripcion").val(datos[2]);
  $("#estado").val(datos[3]);
  $("#inventario").val(datos[4]);
  $("#btnEnviarPro").text("Modificar");
  $("#btnMostrarPro").text("Ocultar");
}

function limpiar(){
  $("#btnEnviarPro").text("Crear");
}