


function LSecrets(param, idpppoeserver) {
  
  $("#spinner-div").show();

  $.ajax({
    url: "../libs/f.secrets.php",
    type: "GET",
    data: { action: "LSecrets", param: param, idpppoeserver: idpppoeserver },
    complete: function(){
      $("#spinner-div").hide();
    },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $("#tbl_secrets").html(jsonData.rhtml);
  });



}

function LActive(param, idpppoeserver) {

  $("#spinner-div").show();

  $.ajax({
    url: "../libs/f.secrets.php",
    type: "GET",
    data: { action: "LActive", param: param, idpppoeserver: idpppoeserver },
    complete: function(){
      $("#spinner-div").hide();
    },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $("#tbl_active").html(jsonData.rhtml);
  });
}

function SaveSecret(
  idSecret,
  nameSecret,
  passwordSecret,
  profileSecret,
  calleridSecret,
  pppoeServer
) {

  $("#spinner-div2").show();

  $.ajax({
    url: "../libs/f.secrets.php",
    type: "GET",
    data: {
      action: "SaveSecret",
      idSecret: idSecret,
      nameSecret: nameSecret,
      passwordSecret: passwordSecret,
      profileSecret: profileSecret,
      calleridSecret: calleridSecret,
      pppoeServer: pppoeServer,
    },
    complete: function(){
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
            btnClass: "btn-dark",
            action: function () {
              location.href =
                "PPPoESecrets.php?param=" + nameSecret + "&idpppoeserver=0";
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
          btnClass: "btn-dark",
          Cerrar: function () {
            parent.location.reload();
          },
        },
      });
    }
  });
}

function DeleteSecret(idSecret, pppoeServer) {

  $("#spinner-div").show();

  $.ajax({
    url: "../libs/f.secrets.php",
    type: "GET",
    data: {
      action: "DeleteSecret",
      idSecret: idSecret,
      pppoeServer: pppoeServer,
    },
    complete: function(){
      $("#spinner-div").hide();
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
            btnClass: "btn-dark",
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
          Cerrar: {
            text: "Cerrar",
            btnClass: "btn-dark",
            action: function () {
              parent.location.reload();
            },
          },
        },
      });
    }
  });
}

function RestartSecret(nameSecret, pppoeServer) {
  $.ajax({
    url: "../libs/f.secrets.php",
    type: "GET",
    data: {
      action: "RestartSecret",
      idSecret: nameSecret,
      pppoeServer: pppoeServer,
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
            btnClass: "btn-dark",
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
          Cerrar: {
            text: "Cerrar",
            btnClass: "btn-dark",
            action: function () {
              parent.location.reload();
            },
          },
        },
      });
    }
  });
}

function chekPPPoEActive(nameSecret,pppoeServer) {

  $("#spinner-div").show();

  $.ajax({
    url: "../libs/f.secrets.php",
    type: "GET",
    data: {
      action: "CheckPPPoEActive",
      nameSecret: nameSecret,
      pppoeServer: pppoeServer,
    },
    complete: function(){
      $("#spinner-div").hide();
    },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    if (jsonData.code === "0") {
      
		var url= "PPPoEActive.php?param=" + nameSecret;
		location.href = url;


    } else {
      $.alert({
        title: "Error",
        type: "red",
        content: jsonData.dcode,
        buttons: {
          Cerrar: {
            text: "Cerrar",
            btnClass: "btn-dark",
            action: function () {
              parent.location.reload();
            },
          },
        },
      });
    }
  });
}
