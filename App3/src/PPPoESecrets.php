<?php include("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Telemas | PPPoE | Secrets</title>
  <meta name="description" content="PPPoE Screts de Telemas" />

  <?php include("header.php");

  $param = trim($_GET['param']);
  $idpppoeserver = ($_GET['idpppoeserver']);

  if ($idpppoeserver == 0) {
    $idpppoeserver = '0';
  }




  ?>

</head>

<body>


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
                  <h1 class="mb-0 pb-0 display-4" id="title">Secrets</h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">PPPoE</a></li>
                      <li class="breadcrumb-item"><a href="PPPoESecrets.php">Secrets</a></li>
                    </ul>
                  </nav>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                  <!-- Add New Button Start -->
                  <button type="button"
                    class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable"
                    data-bs-toggle="modal" data-bs-target="#modal-aeSecrets" id="addSecrets" onClick="ClearInput();">
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
                    <input class="form-control datatable-search" placeholder="Buscar" id="txtbuscasecrets"
                      name="txtbuscasecrets" />
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


                    <select class="form-control" name="pppoeServer1" id="pppoeServer1">



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
              <div id="tbl_secrets">
                <div class="card mb-5">



                  <div class="card-body">


                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">ID </th>
                          <th scope="col">Server</th>
                          <th scope="col">Name</th>
                          <th scope="col">Password</th>
                          <th scope="col">Perfil</th>
                          <th scope="col">Caller ID</th>
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
              <div id="modal-aeSecrets" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

                <div id="spinner-div2" class="pt-5">
                  <div class="spinner-border text-primary" role="status"></div>
                </div>

                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h3 class="modal-title"><strong>Secrets</strong></h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                      <!-- Personal Start -->
                      <section class="scroll-section" id="sites">
                        <h2 class="small-title">Agregar/Editar PPPoE Secrets</h2>
                        <form class="tooltip-end-top" id="sitesForm">
                          <div class="card mb-5">
                            <div class="card-body">
                              <input name="idSecret" id="idSecret" type="hidden" value="" />

                              <div class="row g-3">
                                <div class="col-md-4">
                                  <label class="mb-3 top-label">
                                    <input class="form-control" name="nameSecret" id="nameSecret" />
                                    <span>NAME</span>
                                  </label>
                                </div>

                                <div class="col-md-4">
                                  <label class="mb-3 top-label">
                                    <input class="form-control" name="passwordSecret" id="passwordSecret" />
                                    <span>PASSWORD</span>
                                  </label>
                                </div>

                                <div class="col-md-4">
                                  <div class="mb-3 top-label">
                                    <select class="form-control" name="profileSecret" id="profileSecret">



                                    </select>

                                    <span>PERFIL</span>
                                  </div>
                                </div>

                              </div>

                              <div class="row g-3">

                                <div class="col-md-5">
                                  <label class="mb-3 top-label">
                                    <input class="form-control" name="calleridSecret" id="calleridSecret" />
                                    <span>CALLER ID</span>
                                  </label>
                                </div>

                                <div class="col-md-4">
                                  <div class="mb-3 top-label">
                                    <select class="form-control" name="pppoeServer" id="pppoeServer">


                                    </select>
                                    <span>PPPOE SERVER</span>
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

                      <button class="btn btn-icon btn-icon-end btn-success" onClick="SaveSecret1();">
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
  <script src="../js/secrets.js"></script>





  <script>


    function goActive(name, pppoeServer) {

      chekPPPoEActive(name, pppoeServer);

    }

    function RestartSecret1(nameSecret, pppoeServer) {


      /// RestartSecret(nameSecret, pppoeServer);


    }





    function DelSecret(idSecret, pppoeServer) {


      $.confirm({
        title: 'Eliminar',
        content: '¿Esta Seguro de ELIMINAR EL  SECRET ?, esta accion no se puede deshacer',
        buttons: {
          confirm: {
            text: 'Eliminar',
            btnClass: 'btn-danger',
            action: function () {


              DeleteSecret(idSecret, pppoeServer);


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




      document.getElementById('idSecret').value = "";

      document.getElementById('nameSecret').value = "";

      document.getElementById('passwordSecret').value = "";

      document.getElementById('calleridSecret').value = "";


      $('#nameSecret').prop('disabled', false);

      $('#pppoeServer').prop('disabled', false);

      $("#profileSecret").val("BasicoFTTH").change();

      $("#pppoeServer").val(1).change();


    }



    function GetData(idSecret, nameSecret, passwordSecret, profileSecret, calleridSecret, pppoeServer) {



      document.getElementById('idSecret').value = idSecret;

      document.getElementById('nameSecret').value = nameSecret;

      document.getElementById('passwordSecret').value = passwordSecret;

      document.getElementById('calleridSecret').value = calleridSecret;


      $("#pppoeServer").val(pppoeServer).change();

      $("#profileSecret").val(profileSecret.trim()).change();

      $("#nameSecret").attr('disabled', 'disabled');

      $("#pppoeServer").attr('disabled', 'disabled');





    }


    $(document).ready(function () {


      LProfileSpeed();

      LPPPoEServerSelect(<?php echo $idpppoeserver; ?>);

      LSecrets('<?php echo $param; ?>', '<?php echo $idpppoeserver; ?>');


      <?php

      if (trim($param) != "") {

        echo '
        document.getElementById("txtbuscasecrets").value="' . $param . '";

        document.getElementById("txtbuscasecrets").select();

      ';



      }

      ?>

    });


    $('#pppoeServer1').change(function () {

      var param = document.getElementById('txtbuscasecrets').value;
      var idpppoeserver = document.getElementById('pppoeServer1').value;

      location.href = "PPPoESecrets.php?param=" + param + "&idpppoeserver=" + idpppoeserver;

    });



    $('#txtbuscasecrets').keypress(function (event) {

      var param = document.getElementById('txtbuscasecrets').value;
      var idpppoeserver = document.getElementById('pppoeServer1').value;


      var keycode = (event.keyCode ? event.keyCode : event.which);
      if (keycode == '13') {


        location.href = "PPPoESecrets.php?param=" + param + "&idpppoeserver=" + idpppoeserver;

      }
    });

    function selectElement(id, valueToSelect) {
      let element = document.getElementById(id);
      element.value = valueToSelect;
    }


    function SaveSecret1() {



      $.confirm({
        title: 'Registrar',
        content: '¿Esta Seguro de Registrar SECRET?',
        buttons: {
          confirm: {
            text: 'Registrar',
            btnClass: 'btn-success',
            action: function () {


              SaveSecret(document.getElementById('idSecret').value, document.getElementById('nameSecret').value, document.getElementById('passwordSecret').value, document.getElementById('profileSecret').value, document.getElementById('calleridSecret').value, document.getElementById('pppoeServer').value);


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