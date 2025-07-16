function LAddressLists(param, list, idstaticserver) {
  $("#spinner-div").show();

  $.ajax({
    url: "../libs/f.addressLists.php",
    type: "GET",
    data: {
      action: "LAddressLists",
      param: param,
      list: list,
      idstaticserver: idstaticserver,
    },
    complete: function () {
      $("#spinner-div").hide();
    },
  }).done(function (response) {
    var jsonData = JSON.parse(response);

    $("#tbl_address_lists").html(jsonData.rhtml);
  });
}

function SaveAddressList(
  idAddress,
  nameAddress,
  addressAddress,
  listAddress,
  staticServer,
  addressDisabled
) {


  $("#spinner-div2").show();

  $.ajax({
    url: "../libs/f.addressLists.php",
    type: "GET",
    data: {
      action: "SaveAddressList",
      idAddress: idAddress,
      nameAddress: nameAddress,
      addressAddress: addressAddress,
      listAddress: listAddress,
      staticServer: staticServer,
      addressDisabled: addressDisabled,
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
            btnClass: "btn-dark",
            action: function () {
              location.href = "AddressLists.php?param=" + addressAddress;
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
              location.href = "AddressLists.php?param=" + addressAddress;
            },
          },
        },
      });
    }
  });
}

function DeleteAddress(idAddress, staticServer) {
  $("#spinner-div").show();

  $.ajax({
    url: "../libs/f.addressLists.php",
    type: "GET",
    data: {
      action: "DeleteAddressList",
      idAddress: idAddress,
      staticServer: staticServer,
    },
    complete: function () {
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
