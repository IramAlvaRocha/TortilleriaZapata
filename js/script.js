$(document).ready(function () {
  //Ajax de gestion de empleados
  $("#btn-empleado").click(function (event) {
    event.preventDefault();
    $("#content").children().empty();
    $.ajax("empleados.php").done(function (response) {
      $("#content").html(response);
    });
  });

  $("#btn-sucursales").click(function (event) {
    event.preventDefault();
    $("#content").children().empty();
    $.ajax("sucursales.php").done(function (response) {
      $("#content").html(response);
    });
  });

  $("#btn-proveedores").click(function (event) {
    event.preventDefault();
    $("#content").children().empty();
    $.ajax("proveedores.php").done(function (response) {
      $("#content").html(response);
    });
  });

  $("#btn-notas").click(function (event) {
    event.preventDefault();
    $("#content").children().empty();
    $.ajax("envioNotas.php").done(function (response) {
      $("#content").html(response);
    });
  });

  $("#btn-devoluciones").click(function (event) {
    event.preventDefault();
    $("#content").children().empty();
    $.ajax("devoluciones.php").done(function (response) {
      $("#content").html(response);
    });
  });

  $("#btn-gastos").click(function (event) {
    event.preventDefault();
    $("#content").children().empty();
    $.ajax("gastos.php").done(function (response) {
      $("#content").html(response);
    });
  });

  $("#btn-ventas").click(function (event) {
    event.preventDefault();
    $("#content").children().empty();
    $.ajax("ventas.php").done(function (response) {
      $("#content").html(response);
    });
  });

  $("#btn-productos").click(function (event) {
    event.preventDefault();
    $("#content").children().empty();
    $.ajax("gestionProductos.php").done(function (response) {
      $("#content").html(response);
    });
  });

  $("#mod-empleado").click(function (event) {
    event.preventDefault();
    $("#content").children().empty();
    $.ajax("modificarempleado.php").done(function (response) {
      $("#content").html(response);
    });
  });

  //creacion de las cards
  $.ajax("JSON/productos.json", {
    dataType: "json",
    contentType: "application/json",
    cache: false,
  }).done(function (response) {
    var html;
    $.each(response, function (index, element) {
      html =
        '<div class="card col-3 col-md-3 text-center mx-auto" mb-3 data-id="' +
        element.id +
        '" style="width: 18rem;">';
      html +=
        '<img src="' +
        element.imagen +
        '" class="card-img-top"  width="250" height="150"alt="...">';
      html += '<div class="card-body">';
      html += '<h5 class="card-title">' + element.producto + "</h5>";
      html +=
        '<p class="card-text">' +
        element.descripcion +
        " <br> <h6>Precio $" +
        element.precio +
        "</h6> </p>";
      html += "</div>";
      html += "</div>";
      $("#card-productos").append(html);
    });
  });
  //Fin creacion de cards
});
