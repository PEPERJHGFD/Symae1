<?php include("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Telemas | PPPoE | Active</title>
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
        <div class="spinner-border text-primary" role="status"></div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <!-- Title and Top Buttons Start -->
            <div class="page-title-container">
              <div class="row">

             
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                  <h1 class="mb-0 pb-0 display-4" id="title">Active Connections</h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">PPPoE</a></li>
                      <li class="breadcrumb-item"><a href="PPPoESecrets.php">Active</a></li>
                    </ul>
                  </nav>
                </div>
                <!-- Title End -->


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
                    <input class="form-control datatable-search" placeholder="Buscar" id="txtbuscaactive"
                      name="txtbuscaactive" />
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
              <div id="tbl_active">
                <div class="card mb-5">
                  <div class="card-body">

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Server</th>
                          <th scope="col">Name </th>
                          <th scope="col">Service</th>
                          <th scope="col">Caller ID</th>
                          <th scope="col">Address</th>
                          <th scope="col">Uptime</th>

                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Table End -->







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


    $(document).ready(function () {


      LPPPoEServerSelect(<?php echo $idpppoeserver; ?>);

      LActive('<?php echo $param; ?>', '<?php echo $idpppoeserver; ?>');


    });


    $('#pppoeServer1').change(function () {

      var param = document.getElementById('txtbuscaactive').value;
      var idpppoeserver = document.getElementById('pppoeServer1').value;

      ///location.href="PPPoEActive.php?param="+param+"&idpppoeserver="+idpppoeserver;

      LActive(param, idpppoeserver);

      document.getElementById("txtbuscaactive").select();

    });



    $('#txtbuscaactive').keypress(function (event) {

      var param = document.getElementById('txtbuscaactive').value;
      var idpppoeserver = document.getElementById('pppoeServer1').value;


      var keycode = (event.keyCode ? event.keyCode : event.which);
      if (keycode == '13') {


        LActive(param, idpppoeserver);


        document.getElementById("txtbuscaactive").select();


      }
    });

    function selectElement(id, valueToSelect) {
      let element = document.getElementById(id);
      element.value = valueToSelect;
    }






  </script>

</body>

</html>