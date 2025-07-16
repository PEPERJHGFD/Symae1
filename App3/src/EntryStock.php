
<?php include ("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Symae | Inventario | Entrada</title>
    <meta
      name="description"
      content="Sitios de Telemas"
    />
    
    <?php include ("header.php"); ?>
    
  </head>

  <body>
    <div id="root">

          <?php include ("navbar.php"); ?>

      <main>
        <div class="container">
          <div class="row">
            <div class="col">
              <!-- Title and Top Buttons Start -->
              <div class="page-title-container">
                <div class="row">
                  <!-- Title Start -->
                  <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">Entrada de Inventario</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                      <ul class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Company</a></li>
                        <li class="breadcrumb-item"><a href="Stock.php">Inventario</a></li>
                        <li class="breadcrumb-item"><a href="EntryStock.php">Entrada</a></li>
                      </ul>
                    </nav>
                  </div>
                  <!-- Title End -->

                  <!-- Top Buttons Start -->
                  <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <!-- Add New Button Start -->
                    <a href="EntryStockAdd.php" type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable"  id="addSite">
                      <i data-acorn-icon="plus"></i>
                      <span> Nuevo </span>
                    </a>
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

                
                 

                  <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                    <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                      
                    </div>
                    <div class="d-inline-block">
                      
                      

                  
                    </div>
                  </div>
                </div>
                <!-- Controls End -->

                <!-- Table Start -->
                <div id="tbl_stock">
                  <div class="card mb-5">
                    <div class="card-body">
                     
                        <table class="table table-hover">
                                            <thead>
                                                <tr>

                                                    <th scope="col">ID</th>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Usuario</th>
                                                    <th scope="col">Justificacion</th>
                                                    <th scope="col">Almacen</th>
                                                    <th scope="col">Proveedor</th>
                                                    <th scope="col">ID Factura</th>
                                                    <th scope="col">Fecha Factura</th>
                                                    
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

      <?php include ("footer.php"); ?>
      
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

    <script src="../js/stock.js"></script>

    <script>


$( document ).ready(function() {

LEntryStock('');


});


  

</script>

  </body>
</html>
