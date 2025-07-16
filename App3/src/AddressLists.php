<?php include("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Telemas | PPPoE | Address Lists</title>
  <meta name="description" content="Address Lists de Telemas" />

  <?php include("header.php");

  $param = trim($_GET['param']);
  $idstaticserver = ($_GET['idstaticserver']);
  $list = ($_GET['list']);

  if ($idstaticserver == 0) {
    $idstaticserver = '0';
  }



  ?>

</head>

<body>

  <div id="loader"></div>

  <div id="root">
    <?php include("navbar.php"); ?>

    <main>


      <div id="spinner-div">
        <div class="spinner-border text-primary" role="status">

        </div>
      </div>


      <div class="container">

        <div class="row">

          <div class="col">
            <!-- Title and Top Buttons Start -->
            <div class="page-title-container">
              <div class="row">

                <!-- Title Start -->
                <div class="col-12 col-md-7">
                  <h1 class="mb-0 pb-0 display-4" id="title">Address Lists</h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Wireless</a></li>
                      <li class="breadcrumb-item"><a href="AddressLists.php">Address Lists</a></li>
                    </ul>
                  </nav>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                  <!-- Add New Button Start -->
                  <button type="button"
                    class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable"
                    data-bs-toggle="modal" data-bs-target="#modal-aeAddress" id="aeAddress" onClick="ClearInput();">
                    <i data-acorn-icon="plus"></i>
                    <span> Nuevo </span>
                  </button>
                  <!-- Add New Button End -->
                </div>
                <!-- Top Buttons End -->
              </div>
            </div>
            <!-- Title and Top Buttons End -->

            <!-- Content Start -->
            <div>
              <!-- Controls Start -->
              <div class="row">


                <!-- Search Start -->
                <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                  <div
                    class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                    <input class="form-control datatable-search" placeholder="Buscar" id="txtbuscaaddress"
                      name="txtbuscaaddress" />
                    <span class="search-magnifier-icon">
                      <i data-acorn-icon="search"></i>
                    </span>
                    <span class="search-delete-icon d-none">
                      <i data-acorn-icon="close"></i>
                    </span>
                  </div>
                </div>
                <!-- Search End -->

                <!-- Search Start -->
                <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                  <div
                    class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">

                    <select class="form-control" name="selectList" id="selectList">

                      <option value="0">Todas las Listas</option>
                      <option value="Clients1">Clients1</option>
                      <option value="Clients2">Clients2</option>
                      <option value="Clients3">Clients3</option>
                      <option value="Clients4">Clients4</option>
                      <option value="Clients5">Clients5</option>
                      <option value="Clients6">Clients6</option>
                      <option value="Clients7">Clients7</option>
                    </select>

                  </div>
                </div>
                <!-- Search End -->


                <!-- Search Start -->
                <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                  <div
                    class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">

                    <select class="form-control" name="staticServer1" id="staticServer1">



                    </select>



                  </div>
                </div>
                <!-- Search End -->

                <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                  <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">

                  </div>
                  <div class="d-inline-block">




                  </div>
                </div>
              </div>
              <!-- Controls End -->

              <!-- Table Start -->
              <div id="tbl_address_lists">
                <div class="card mb-5">



                  <div class="card-body">


                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">ID </th>
                          <th scope="col">Name</th>
                          <th scope="col">List</th>
                          <th scope="col">Address</th>
                          <th scope="col">Creation Time</th>
                          <th scope="col">Last Update</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Table End -->

              <!--  Checkout Modal -->
              <div id="modal-aeAddress" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

                <div id="spinner-div2" class="pt-5">
                  <div class="spinner-border text-primary" role="status"></div>
                </div>

                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h3 class="modal-title"><strong>Address</strong></h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                      <!-- Personal Start -->
                      <section class="scroll-section" id="sites">
                        <h2 class="small-title">Agregar/Editar Address</h2>
                        <form class="tooltip-end-top" id="sitesForm">
                          <div class="card mb-5">
                            <div class="card-body">
                              <input name="idAddress" id="idAddress" type="hidden" value="" />

                              <div class="row g-3">
                                <div class="col-md-4">
                                  <label class="mb-3 top-label">
                                    <input class="form-control" name="nameAddress" id="nameAddress" disabled />
                                    <span>NAME</span>
                                  </label>
                                </div>

                                <div class="col-md-4">
                                  <label class="mb-3 top-label">
                                    <input class="form-control" name="addressAddress" id="addressAddress" />
                                    <span>ADDRESS</span>
                                  </label>
                                </div>

                                <div class="col-md-4">
                                  <div class="mb-3 top-label">
                                    <select class="form-control" name="listAddress" id="listAddress">
                                      <option value="Clients1">Clients1</option>
                                      <option value="Clients2">Clients2</option>
                                      <option value="Clients3">Clients3</option>
                                      <option value="Clients4">Clients4</option>
                                      <option value="Clients5">Clients5</option>
                                      <option value="Clients6">Clients6</option>
                                      <option value="Clients7">Clients7</option>
                                    </select>

                                    <span>LIST</span>
                                  </div>
                                </div>

                              </div>

                              <div class="row g-3">

                                <div class="col-md-4">
                                  <div class="mb-3 top-label">
                                    <select class="form-control" name="staticServer" id="staticServer">

                                    </select>

                                    <span>STATIC SERVER</span>
                                  </div>

                                </div>
                                <div class="col-md-2">

                                  <div class="top-label custom-control-container">
                                    <div class="form-check form-switch">
                                      <input type="checkbox" class="form-check-input" id="addressDisabled" />
                                    </div>
                                    <span>DISABLED</span>
                                  </div>

                                </div>


                              </div>




                            </div>

                          </div>
                        </form>
                      </section>
                      <!-- Personal End -->


                    </div>


                    <div class="modal-footer">

                      <button class="btn btn-icon btn-icon-end btn-success" onClick="SaveAddress1();">
                        <span>Guardar</span>

                      </button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- END Checkout Modal -->





            </div>
            <!-- Content End -->
          </div>


        </div>
      </div>
    </main>

    <?php include("footer.php"); ?>

  </div>









  <!-- Vendor Scripts Start -->


  <script src="js/vendor/jquery-3.5.1.min.js"></script>
  <script src="js/vendor/bootstrap.bundle.min.js"></script>
  <script src="js/vendor/OverlayScrollbars.min.js"></script>
  <script src="js/vendor/autoComplete.min.js"></script>
  <script src="js/vendor/clamp.min.js"></script>

  <script src="icon/acorn-icons.js"></script>
  <script src="icon/acorn-icons-interface.js"></script>


  <script src="js/cs/scrollspy.js"></script>

  <script src="js/vendor/select2.full.min.js"></script>

  <script src="js/vendor/datepicker/bootstrap-datepicker.min.js"></script>

  <script src="js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js"></script>

  <!-- Vendor Scripts End -->

  <!-- Template Base Scripts Start -->
  <script src="js/base/helpers.js"></script>
  <script src="js/base/globals.js"></script>
  <script src="js/base/nav.js"></script>
  <script src="js/base/search.js"></script>
  <script src="js/base/settings.js"></script>
  <!-- Template Base Scripts End -->

  <!-- Page Specific Scripts Start  -->

  <script src="js/common.js"></script>
  <script src="js/scripts.js"></script>

  <!-- Page Specific Scripts End -->


  <script src="../js/controls.select2.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>


  <script src="../js/devices.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/addressLists.js"></script>

  <script>




    function DelAddres(idAddress, staticServer) {


      $.confirm({
        title: 'Eliminar',
        content: '¿Esta Seguro de ELIMINAR la ADDRESS ?, esta accion no se puede deshacer',
        buttons: {
          confirm: {
            text: 'Eliminar',
            btnClass: 'btn-danger',
            action: function () {


              DeleteAddressList(idAddress, staticServer);


            }
          },
          cancel: {
            text: 'Cancelar',
            btnClass: 'btn-dark',
            action: function () {

              parent.location.reload();

            }
          }

        }
      });


    }

    function ClearInput() {

      document.getElementById('idAddress').value = "";

      document.getElementById('nameAddress').value = "";

      document.getElementById('addressAddress').value = "";

      document.getElementById('addressDisabled').checked = false;

      $('#staticServer').prop('disabled', false);

      $("#addressAddress").attr('disabled', false);

      $("#listAdrress").val("Clients1").change();

    }

    $('#modal-aeAddress').on('shown.bs.modal', function () {
      $('#addressAddress').focus();
    })


    function GetData(idAddress, nameAddress, addressAddress, listAddress, staticServer, addressDisabled) {

      

      document.getElementById('idAddress').value = idAddress;

      document.getElementById('nameAddress').value = nameAddress;

      document.getElementById('addressAddress').value = addressAddress;

      if (addressDisabled==1) {

        document.getElementById('addressDisabled').checked = true;

      } else {

        document.getElementById('addressDisabled').checked = false;

      }


      $("#staticServer").val(staticServer).change();

      $("#listAddress").val(listAddress.trim()).change();

      $("#staticServer").attr('disabled', 'disabled');

      $("#addressAddress").attr('disabled', 'disabled');

    }

    function listSelect(list) {

      $("#selectList").val(list.trim()).change();

    }


    $(document).ready(function () {

      LStaticServerSelect(<?php echo $idstaticserver; ?>);

      LAddressLists('<?php echo $param; ?>', '<?php echo $list; ?>', '<?php echo $idstaticserver; ?>');

      <?php

      if (trim($param) != "") {

        echo '
        document.getElementById("txtbuscaaddress").value="' . $param . '";

        document.getElementById("txtbuscaaddress").select();

      ';

      }

      ?>

    });


    $('#staticServer1').change(function () {

      var param = document.getElementById('txtbuscaaddress').value;
      var idstaticServer = document.getElementById('staticServer1').value;
      var list = document.getElementById('selectList').value;

      location.href = "AddressLists.php?param=" + param + "&list=" + list + "&idstaticserver=" + idstaticServer;

    });


    $('#selectList').change(function () {

      var param = document.getElementById('txtbuscaaddress').value;
      var idstaticServer = document.getElementById('staticServer1').value;
      var list = document.getElementById('selectList').value;

      location.href = "AddressLists.php?param=" + param + "&list=" + list + "&idstaticserver=" + idstaticServer;

    });


    $('#txtbuscaaddress').keypress(function (event) {

      var param = document.getElementById('txtbuscaaddress').value;
      var idstaticServer = document.getElementById('staticServer1').value;
      var list = document.getElementById('selectList').value;



      var keycode = (event.keyCode ? event.keyCode : event.which);
      if (keycode == '13') {


        location.href = "AddressLists.php?param=" + param + "&list=" + list + "&idstaticserver=" + idstaticServer;

      }
    });

    function SaveAddress1() {

      if(document.getElementById('addressDisabled').checked){
            addressDisabled=1;
          }else{
            addressDisabled=0;
          }


      $.confirm({
        title: 'Registrar',
        content: '¿Esta Seguro de Registrar el ADDRESS?',
        buttons: {
          confirm: {
            text: 'Registrar',
            btnClass: 'btn-success',
            action: function () {


              SaveAddressList(document.getElementById('idAddress').value, document.getElementById('nameAddress').value, document.getElementById('addressAddress').value, document.getElementById('listAddress').value, document.getElementById('staticServer').value, addressDisabled);


            }
          },
          cancel: {
            text: 'Cancelar',
            btnClass: 'btn-dark',
            action: function () {

              parent.location.reload();

            }
          }

        }
      });







    }



  </script>

</body>

</html>