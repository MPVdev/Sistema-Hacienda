$(document).ready(function () {
  $("#formlogeo").on('submit', function (e) {
    logeo(e);
  });

  function logeo(e) {
    e.preventDefault();
    var Data = new FormData($("#formlogeo")[0]);
    $.ajax({
      url: "../ajax/empleados.php?op=logeo",
      type: "POST",
      contentType: false,
      processData: false,
      async: false,
      data: Data,
      success: function (datos) {
        if (datos === "0") {
          $(location).attr("href", "home.php");
        } else if (datos === "1") {
          $(location).attr("href", "home.php");
        } else {
          alert("Clave o Usuario incorrecto");
        }
      }
    });
  }
});
