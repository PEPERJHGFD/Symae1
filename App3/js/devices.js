function LDevices(param, idsite) {
  $.ajax({
    url: "../libs/f.devices.php",
    type: "GET",
    data: { action: "LDevices", param: param, idsite: idsite },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $("#tbl_devices").html(jsonData.rhtml);
  });
}

function SaveDevice(
  idDev,
  nameDev,
  marcaDev,
  modeloDev,
  typeDev,
  siteDev,
  isactiveDev,
  useradminDev,
  passadminDev,
  noteDev,
  ipadminDev,
  portadminDev,
  adminDev,
  apirestDev,
  ipapiDev,
  portapiDev,
  userapiDev,
  passapiDev,
  staticserverDev,
  pppoeserverDev,
  ipospfDev,
  networkospfDev,
  idrouterospfDev,
  loopbackospfDev,
  isCriticalDev,
  ssidDev,
  frequencyDev,
  ssidKeyDev
) {
  $.ajax({
    url: "../libs/f.devices.php",
    type: "GET",
    data: {
      action: "SaveDevice",
      idDev: idDev,
      nameDev: nameDev,
      marcaDev: marcaDev,
      modeloDev: modeloDev,
      typeDev: typeDev,
      siteDev: siteDev,
      isactiveDev: isactiveDev,
      useradminDev: useradminDev,
      passadminDev: passadminDev,
      noteDev: noteDev,
      ipadminDev: ipadminDev,
      portadminDev: portadminDev,
      adminDev: adminDev,
      apirestDev: apirestDev,
      ipapiDev: ipapiDev,
      portapiDev: portapiDev,
      userapiDev: userapiDev,
      passapiDev: passapiDev,
      staticserverDev: staticserverDev,
      pppoeserverDev: pppoeserverDev,
      ipospfDev: ipospfDev,
      networkospfDev: networkospfDev,
      idrouterospfDev: idrouterospfDev,
      loopbackospfDev: loopbackospfDev,
      isCriticalDev: isCriticalDev,
      ssidDev: ssidDev,
      frequencyDev: frequencyDev,
      ssidKeyDev: ssidKeyDev,
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
            btnClass: "btn-blue",
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
          Cerrar: function () {
            parent.location.reload();
          },
        },
      });
    }
  });
}

function LSitesSelect(idsite) {
  $.ajax({
    url: "../libs/f.sites.php",
    type: "GET",
    data: { action: "LSites2", param: " " },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $("#siteDev1").append(
      $("<option>").text("Todos los sitios").attr("value", "0")
    );

    $(jsonData["data"]).each(function () {
      $("#siteDev").append(
        $("<option>").text(this.Name).attr("value", this.id)
      );

      $("#siteDev1").append(
        $("<option>").text(this.Name).attr("value", this.id)
      );
    });

    //selecciona el primer valos
    $("#siteDev").prop("selectedIndex", 0);

    ///selecciona el valor que se le indique
    $("#siteDev1").val(idsite);

    $("#siteDev").trigger("chosen:updated");
    $("#siteDev1").trigger("chosen:updated");
  });
}

function LPPPoEServerSelect(idpppoeserver) {
  $.ajax({
    url: "../libs/f.devices.php",
    type: "GET",
    data: { action: "LPPPoEServer" },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $("#pppoeServer1").append(
      $("<option>").text("Todos los Servidores").attr("value", "0")
    );

    $(jsonData["data"]).each(function () {
      $("#pppoeServer").append(
        $("<option>").text(this.NameDev.trim()).attr("value", this.iddev)
      );

      $("#pppoeServer1").append(
        $("<option>").text(this.NameDev.trim()).attr("value", this.iddev)
      );
    });

    //selecciona el primer valor
    $("#pppoeServer").prop("selectedIndex", 0);

    ///selecciona el valor que se le indique
    $("#pppoeServer1").val(idpppoeserver);

    $("#pppoeServer").trigger("chosen:updated");
    $("#pppoeServer1").trigger("chosen:updated");
  });
}

function GetDevice(id) {
  $.ajax({
    url: "../libs/f.devices.php",
    type: "GET",
    data: { action: "GetDevice", id: id },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $("#idDev").val(jsonData["data"][0]["id"]);
    $("#nameDev").val(jsonData["data"][0]["Name"]);
    $("#marcaDev").val(jsonData["data"][0]["Marca"]).change();
    $("#modeloDev").val(jsonData["data"][0]["Modelo"]);
    $("#typeDev").val(jsonData["data"][0]["TipoEqui"]).change();
    $("#siteDev").val(jsonData["data"][0]["idSite"]).change();

    if (jsonData["data"][0]["isActive"] == 1) {
      $("#isactiveDev")[0].checked = true;
    } else {
      $("#isactiveDev")[0].checked = false;
    }

    if (jsonData["data"][0]["isCritical"] == 1) {
      $("#isCriticalDev")[0].checked = true;
    } else {
      $("#isCriticalDev")[0].checked = false;
    }

    $("#useradminDev").val(jsonData["data"][0]["UserAdmin"]);
    $("#passadminDev").val(jsonData["data"][0]["PassAdmin"]);
    $("#noteDev").val(jsonData["data"][0]["Note"]);

    $("#ipadminDev").val(jsonData["data"][0]["IPAdmin"]);
    $("#portadminDev").val(jsonData["data"][0]["PuertoAdmin"]);
    $("#adminDev").val(jsonData["data"][0]["AppAdmin"]).change();

    if (jsonData["data"][0]["isApiRest"] == 1) {
      $("#apirestDev")[0].checked = true;
    } else {
      $("#apirestDev")[0].checked = false;
    }

    $("#ipapiDev").val(jsonData["data"][0]["IPApi"]);
    $("#portapiDev").val(jsonData["data"][0]["PuertoApi"]);
    $("#userapiDev").val(jsonData["data"][0]["UserApi"]);
    $("#passapiDev").val(jsonData["data"][0]["PassApi"]);

    if (jsonData["data"][0]["isStaticServer"] == 1) {
      $("#staticserverDev")[0].checked = true;
    } else {
      $("#staticserverDev")[0].checked = false;
    }

    if (jsonData["data"][0]["isPPPOEServer"] == 1) {
      $("#pppoeserverDev")[0].checked = true;
    } else {
      $("#pppoeserverDev")[0].checked = false;
    }

    $("#ipospfDev").val(jsonData["data"][0]["IPAddrOSPF"]);
    $("#networkospfDev").val(jsonData["data"][0]["NetworkOSPF"]);
    $("#idrouterospfDev").val(jsonData["data"][0]["idRouterOSPF"]);
    $("#loopbackospfDev").val(jsonData["data"][0]["LoopbackOSPF"]);

    $("#ssidDev").val(jsonData["data"][0]["SSID"]);
    $("#frequencyDev").val(jsonData["data"][0]["Frequency"]);
    $("#ssidKeyDev").val(jsonData["data"][0]["SSIDKey"]);
  });
}

function LStaticServerSelect(idstaticserver) {
  $.ajax({
    url: "../libs/f.devices.php",
    type: "GET",
    data: { action: "LStaticServer" },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $("#staticServer1").append(
      $("<option>").text("Todos los Servidores").attr("value", "0")
    );

    $(jsonData["data"]).each(function () {
      $("#staticServer").append(
        $("<option>").text(this.NameDev.trim()).attr("value", this.iddev)
      );

      $("#staticServer1").append(
        $("<option>").text(this.NameDev.trim()).attr("value", this.iddev)
      );
    });

    //selecciona el primer valor
    $("#staticServer").prop("selectedIndex", 0);

    ///selecciona el valor que se le indique
    $("#staticServer1").val(idstaticserver);

    $("#staticServer").trigger("chosen:updated");
    $("#staticServer1").trigger("chosen:updated");
  });
}
