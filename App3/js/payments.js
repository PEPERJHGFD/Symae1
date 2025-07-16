function DeletePay(idpay, comen) {
  $.ajax({
    url: "../libs/f.payments.php",
    type: "GET",
    data: { action: "DeletePay", idpay: idpay, comen: comen },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    if (jsonData.code === "0") {
      $.alert({
        title: "Respuesta",
        type: "green",
        content: jsonData.dcode,
        buttons: {
          Cerrar: {
            text: "Cerrar",
            btnClass: "btn-red",
            action: function () {
              parent.location.reload();
            },
          },
        },
      });
    } else {
      $.alert({
        title: "Error",
        type: "red",
        content: jsonData.dcode,
        buttons: {
          ok: function () {
            //parent.location.reload();
          },
        },
      });
    }
  });
}

function SavePay(
  iducrm,
  idcli,
  methodid,
  fecha,
  hora,
  aut,
  monto,
  notas,
  nomcli
) {
  $("#spinner-div2").show();

  $.ajax({
    url: "../libs/f.payments.php",
    type: "GET",
    data: {
      action: "SavePay",
      iducrm: iducrm,
      idcli: idcli,
      methodid: methodid,
      fecha: fecha,
      hora: hora,
      aut: aut,
      monto: monto,
      notas: notas,
    },
    complete: function () {
      $("#spinner-div2").hide();
    },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    if (jsonData.code === "0") {
      $.alert({
        title: "Respuesta",
        type: "green",
        content: jsonData.dcode,
        buttons: {
          Cerrar: {
            text: "Cerrar",
            btnClass: "btn-red",
            action: function () {
              parent.location.reload();
            },
          },

          Ticket: {
            text: "Ticket",
            btnClass: "btn-blue",
            action: function () {
              $("txtidUCRM").text("");
              $("txtidcli").text("");
              $("txtfec").text("");
              $("txthora").text("");
              $("txtaut").text("");
              $("txtmonto").text("");
              $("txtnotas").text("");

              PrintTicket(
                iducrm,
                idcli,
                methodid,
                fecha,
                hora,
                aut,
                monto,
                notas,
                nomcli
              );
            },
          },
        },
      });
    } else {
      $.alert({
        title: "Error",
        type: "red",
        content: jsonData.dcode,
        buttons: {
          Cerrar: function () {
            parent.location.reload();
          },
        },
      });
    }
  });
}

function PrintTicket(
  iducrm,
  idcli,
  methodid,
  fecha,
  hora,
  aut,
  monto,
  notas,
  nomcli
) {
  var rhtml = "Ticket de venta";

  //var hoy = new Date();
  ///var fecha = hoy.getDate()+"/"+(hoy.getMonth()+1)+"/"+hoy.getFullYear();
  //var hora=hoy.getHours()+":"+hoy.getMinutes()+":"+hoy.getSeconds();
  var fechor = fecha + " " + hora;

  $("#ticket").html(
    "Fecha: <b>" +
      fechor +
      "</b><br><br><br>Cliente: <b>" +
      nomcli +
      "</b><br><br><br>Monto:$ <b>" +
      monto +
      "</b><br><br><br>¡Gracias por ser parte de nosotros!"
  );

  $("#ticket").printThis({
    importCSS: false,
    header: "<h3>Telemas + </h3>",
    afterPrint: function () {
      parent.location.reload();
    },
  });
}

function LMethod(param) {
  $.ajax({
    url: "../libs/f.payments.php",
    type: "GET",
    data: { action: "LMethod", param: param },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $(jsonData["data"]).each(function () {
      $("#Select_Method").append(
        $("<option>").text(this.method).attr("value", this.id)
      );
    });

    $("#Select_Method").prop("selectedIndex", 1);

    $("#Select_Method").trigger("chosen:updated");
  });
}

function LPayments(param, idcli) {
  $.ajax({
    url: "../libs/f.payments.php",
    type: "GET",
    data: { action: "LPayments", param: param, idcli: idcli },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $("#tbl_payments").html(jsonData.rhtml);
  });
}
