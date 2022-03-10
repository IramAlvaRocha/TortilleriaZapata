$(document).ready(function () {
  $("#busqueda").focus(); //Hacemos que el objeto (INPUT) se enfoque

  $("#busqueda").on("keyup", function () {
    //Una funcion la cual cada que se presione una tecla, haga la consutla
    var search = $("#busqueda").val();
    $.ajax({
      type: "POST",
      url: "./scripts/buscarproducto.php", //Aquí se mandarán los datos con POST.
      data: { search: search },
      beforeSend: function () {
        $("#ResultDiv").html();
      },
    })

      .done(function (resultado) {
        $("#ResultDiv").html(resultado); //Se mostrará nuestro DIV con los resultados parecidos a la busqueda
      })
      .fail(function () {
        //En caso de que la consulta esté mal
        alert("Error de algo equisde");
      });
  });
  if ((search = "")) {
    //Prototipo para que cuando no haya nada escroto, se desaparezca el div.
    document.getElementById("ResultDiv").style.display = "none";
  }
});
