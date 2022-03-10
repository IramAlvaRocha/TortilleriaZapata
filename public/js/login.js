function init() {}

$(document).ready(function () {});

$(document).on("click", "#btnlogin", function () {
  var usu_correo = $("#txtcorreo").val();
  var usu_pass = $("#txtpass").val();

  $.post(
    "../controller/usuario.php?op=acceso",
    { usu_correo, usu_pass },
    function (data) {
      console.log(data);
    }
  );
});
