function GetStatusFiber(idUCRM, idcli) {
  $("#spinner-div2").show();
  $.ajax({
    url: "../libs/f.clients.php",
    type: "GET",
    data: { action: "GetStatusFiber", idUCRM: idUCRM, idcli: idcli },
    complete: function () {
      $("#spinner-div2").hide();
    },
  }).done(function (response) {
    var jsonData = JSON.parse(response);
    $("#tblstatusClient").html(jsonData.rhtml);
  });
}

function GetStatusStatic(idUCRM, idcli) {
  $("#spinner-div2").show();
  $.ajax({
    url: "../libs/f.clients.php",
    type: "GET",
    data: { action: "GetStatusStatic", idUCRM: idUCRM, idcli: idcli },
    complete: function () {
      $("#spinner-div2").hide();
    },
  }).done(function (response) {
    var jsonData = JSON.parse(response);
    $("#tblstatusClient").html(jsonData.rhtml);
  });
}


function SaveCliEdit(
  id,
  nom,
  ape,
  dire1,
  dire2,
  ciu,
  est,
  cp,
  tel,
  movil,
  correo,
  Frfc,
  Fnom,
  Fdire,
  Fciu,
  Fest,
  Fcp
) {
  $.ajax({
    url: "../libs/f.clients.php",
    type: "GET",
    data: {
      action: "SaveCliEdit",
      id: id,
      nom: nom,
      ape: ape,
      dire1: dire1,
      dire2: dire2,
      ciu: ciu,
      est: est,
      cp: cp,
      tel: tel,
      movil: movil,
      correo: correo,
      Frfc: Frfc,
      Fnom: Fnom,
      Fdire: Fdire,
      Fciu: Fciu,
      Fest: Fest,
      Fcp: Fcp,
    },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    if (jsonData.code === "0") {
      $.alert({
        title: "Respuesta",
        type: "green",
        content: jsonData.dcode,
        buttons: {
          ok: function () {
            parent.location.reload();
          },
        },
      });
    } else {
      One.helpers("notify", {
        type: "danger",
        icon: "fa fa-times mr-1",
        message: jsonData.dcode,
      });
    }
  });
}

function GetCli(id) {
  $.ajax({
    url: "../libs/f.clients.php",
    type: "GET",
    data: { action: "GetCli", id: id },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $("#txt-cli-id").val(jsonData.id);
    $("#txt-cli-nom").val(jsonData.nom);
    $("#txt-cli-ape").val(jsonData.ape);
    $("#txt-cli-dire1").val(jsonData.dire1);
    $("#txt-cli-dire2").val(jsonData.dire2);
    $("#txt-cli-ciu").val(jsonData.ciu);
    $("#sel-cli-est").val(jsonData.est);
    $("#txt-cli-cp").val(jsonData.cp);
    $("#txt-cli-tel").val(jsonData.tel);
    $("#txt-cli-movil").val(jsonData.movil);
    $("#txt-cli-correo").val(jsonData.correo);
    $("#txt-cli-Frfc").val(jsonData.Frfc);
    $("#txt-cli-Fnom").val(jsonData.Fnom);
    $("#txt-cli-Fdire").val(jsonData.Fdire);
    $("#txt-cli-Fciu").val(jsonData.Fciu);
    $("#sel-cli-Fest").val(jsonData.Fest);
    $("#txt-cli-Fcp").val(jsonData.Fcp);
  });
}

function SaveCli(
  nom,
  ape,
  dire1,
  dire2,
  ciu,
  est,
  cp,
  tel,
  movil,
  correo,
  Frfc,
  Fnom,
  Fdire,
  Fciu,
  Fest,
  Fcp
) {
  $.ajax({
    url: "../libs/f.clients.php",
    type: "GET",
    data: {
      action: "SaveCli",
      nom: nom,
      ape: ape,
      dire1: dire1,
      dire2: dire2,
      ciu: ciu,
      est: est,
      cp: cp,
      tel: tel,
      movil: movil,
      correo: correo,
      Frfc: Frfc,
      Fnom: Fnom,
      Fdire: Fdire,
      Fciu: Fciu,
      Fest: Fest,
      Fcp: Fcp,
    },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    if (jsonData.code === "0") {
      $.alert({
        title: "Respuesta",
        type: "green",
        content: jsonData.dcode,
        buttons: {
          ok: function () {
            parent.location.reload();
          },
        },
      });
    } else {
      One.helpers("notify", {
        type: "danger",
        icon: "fa fa-times mr-1",
        message: jsonData.dcode,
      });
    }
  });
}

function LClients(param) {
  $("#spinner-div").show();

  $.ajax({
    url: "../libs/f.clients.php",
    type: "GET",
    data: { action: "LClients", param: param },
    complete: function () {
      $("#spinner-div").hide();
    },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $("#tbl_clients").html(jsonData.rhtml);
  });
}
