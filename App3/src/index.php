<?php include ("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Symae | Dashboard</title>
    <meta name="description" content="Ecommerce Dashboard" />
    <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="img/favicon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="img/favicon/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="img/favicon/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="img/favicon/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="img/favicon/mstile-310x310.png" />
    <!-- Favicon Tags End -->
    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="font/CS-Interface/style.css" />
    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/OverlayScrollbars.min.css" />

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="css/styles.css" />
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="css/main.css" />
    <script src="js/base/loader.js"></script>
  </head>

  <body>
    <div id="root">
      
      <?php include ("navbar.php"); ?>


      <main>
        <div class="container">
          <!-- Title and Top Buttons Start -->
          <div class="page-title-container">
            <div class="row">
              <!-- Title Start -->
              <div class="col-12 col-md-7">
                <a class="muted-link pb-2 d-inline-block hidden" href="#">
                  <span class="align-middle lh-1 text-small">&nbsp;</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">¡ Bienvenid@, <?php echo $_SESSION['nom']; ?> !</h1>
              </div>
              <!-- Title End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->

          <!-- Stats Start CRM-->
          <div class="row">
            <div class="col-12">
              <div class="d-flex">
                
                <h2 class="small-title">CRM</h2>
              </div>
              <div class="mb-5">
                <div class="row g-2">

                  <div class="col-6 col-md-4 col-lg-2">
                    <div class="card h-100 hover-scale-up cursor-pointer" onclick="redirectToCustomers()">
                      <div class="card-body d-flex flex-column align-items-center">
                        <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                          <i data-acorn-icon="antenna" class="text-primary"></i>
                        </div>
                        <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">CLIENTES</div>
                        <div class="text-primary cta-4"><div id="activeClients"></div></div>
                        <br>
                        <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">SUSPENDIDOS</div>
                        <div class="text-danger cta-4"><div id="suspendedClients"></div></div>
                      </div>
                    </div>
                  </div>

                  
                  
                  
                  <div class="col-6 col-md-4 col-lg-2">
                    <div class="card h-100 hover-scale-up cursor-pointer">
                      <div class="card-body d-flex flex-column align-items-center">
                        <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                          <i data-acorn-icon="user" class="text-primary"></i>
                        </div>
                        <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">USUARIOS</div>
                        <div class="text-primary cta-4"><div id="activeUsers"></div></div>
                      </div>
                    </div>
                  </div>
                  
                  

                </div>
              </div>
            </div>
          </div>
          <!-- Stats End CRM-->

          <!-- Stats Start NETWORK-->
          <div class="row">
            <div class="col-12">
              <div class="d-flex">
                
                <h2 class="small-title">NETWORK</h2>
              </div>
              <div class="mb-5">
                <div class="row g-2">

                  <div class="col-6 col-md-4 col-lg-2">
                    <div class="card h-100 hover-scale-up cursor-pointer" onclick="redirectSites()">
                      <div class="card-body d-flex flex-column align-items-center">
                        <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                          <i data-acorn-icon="pin" class="text-primary"></i>
                        </div>
                        <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">SITIOS ACTIVOS</div>
                        <div class="text-primary cta-4"><div id="activeSites"></div></div>
                      </div>
                    </div>
                  </div>

                  <div class="col-6 col-md-4 col-lg-2">
                    <div class="card h-100 hover-scale-up cursor-pointer" onclick="redirectDevices()">
                      <div class="card-body d-flex flex-column align-items-center">
                        <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                          <i data-acorn-icon="router" class="text-primary"></i>
                        </div>
                        <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">EQUIPOS ACTIVOS</div>
                        <div class="text-primary cta-4"><div id="activeDevices"></div></div>
                      </div>
                    </div>
                  </div>


                  
                  
                  
                  
                </div>
              </div>
            </div>
          </div>
          <!-- Stats End NETWORK-->




        </div>
      </main>
      
      <?php include ("footer.php"); ?>

      
    </div>

    

    <!-- Search Modal Start -->
    <div class="modal fade modal-under-nav modal-search modal-close-out" id="searchPagesModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header border-0 p-0">
            <button type="button" class="btn-close btn btn-icon btn-icon-only btn-foreground" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body ps-5 pe-5 pb-0 border-0">
            <input id="searchPagesInput" class="form-control form-control-xl borderless ps-0 pe-0 mb-1 auto-complete" type="text" autocomplete="off" />
          </div>
          <div class="modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0">
            <span class="text-alternate d-inline-block m-0 me-3">
              <i data-acorn-icon="arrow-bottom" data-acorn-size="15" class="text-alternate align-middle me-1"></i>
              <span class="align-middle text-medium">Navigate</span>
            </span>
            <span class="text-alternate d-inline-block m-0 me-3">
              <i data-acorn-icon="arrow-bottom-left" data-acorn-size="15" class="text-alternate align-middle me-1"></i>
              <span class="align-middle text-medium">Select</span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- Search Modal End -->

    <!-- Vendor Scripts Start -->
    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/OverlayScrollbars.min.js"></script>
    <script src="js/vendor/autoComplete.min.js"></script>
    <script src="js/vendor/clamp.min.js"></script>
    <script src="icon/acorn-icons.js"></script>
    <script src="icon/acorn-icons-interface.js"></script>
    <script src="icon/acorn-icons-commerce.js"></script>

    <script src="js/vendor/Chart.bundle.min.js"></script>

    <script src="js/vendor/chartjs-plugin-rounded-bar.min.js"></script>

    <script src="js/vendor/jquery.barrating.min.js"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="js/base/helpers.js"></script>
    <script src="js/base/globals.js"></script>
    <script src="js/base/nav.js"></script>
    <script src="js/base/search.js"></script>
    <script src="js/base/settings.js"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->

    <script src="js/cs/charts.extend.js"></script>

    <script src="js/pages/dashboard.js"></script>

    <script src="js/common.js"></script>
    <script src="js/scripts.js"></script>


    <script src="../js/main.js"></script>
    <!-- Page Specific Scripts End -->



    <script>
      // Funciones de redirección
      function redirectToCustomers() {
        window.location.href = 'Customers.php'; 
      }

      function redirectSites() {
        window.location.href = 'Sites.php';
      }

      function redirectDevices() {
        window.location.href = 'Devices.php'; 
      }

      $( document ).ready(function() {
          ShowStats();
       });
    </script>

  </body>
</html>