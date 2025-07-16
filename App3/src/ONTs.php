
<?php include ("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Telemas | ONT</title>
    <meta
      name="description"
      content="ONT de Telemas"
    />
    
    <?php include ("header.php"); 
    
    
    $param=trim($_GET['param']);
    $iddevice=($_GET['iddevice']);

    if($iddevice==0){
      $iddevice='0';
    }
    
    ?>
    

  </head>

  <body>
    <div id="root">

          <?php include ("navbar.php"); ?>

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
                    <h1 class="mb-0 pb-0 display-4" id="title">ONT</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                      <ul class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Network</a></li>
                        <li class="breadcrumb-item"><a href="Devices.php">ONT</a></li>
                      </ul>
                    </nav>
                  </div>
                  <!-- Title End -->

                  <!-- Top Buttons Start -->
                  <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                  
                  

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
                    <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                      <input class="form-control datatable-search" placeholder="Buscar" id="txtbuscastation"  name="txtbuscastation"/>
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
                    <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground" >
                    
                    
                              <select class="form-control" name="selectDevicesONT" id="selectDevicesONT" >
                                
                              
                                
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
                <div id="tbl_onts">
                  <div class="card mb-5">
                    <div class="card-body">
                     
                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">OLT</th>
                                                    <th scope="col">SLOT</th>
                                                    <th scope="col">PORT</th>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">DEVICE MODEL</th>
                                                    <th scope="col">DEVICE NAME</th>
                                                    <th scope="col">SN</th>
                                                    <th scope="col">SN2</th>
                                                    <th scope="col">STATION MAC </th>
                                                    <th scope="col">DEVICE MODEL</th>
                                                    <th scope="col">DEVICE NAME</th>
                                                    <th scope="col">LOCAL SIGNAL</th>
                                                    <th scope="col">DISTANCE</th>
                                                    <th scope="col">DOWNLINK <br> CAPACITY</th>
                                                    <th scope="col">UPLINK <br> CAPACITY</th>
                                                    <th scope="col">CONNECTION <br> TIME</th>
                                                    <th scope="col">LAST IP</th>
                                                    <th scope="col">LAST UPDATE</th>

                                                    
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
    <script src="icon/acorn-icons-commerce.js"></script>

    

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


    <script src="../js/onts.js"></script>

    <script src="../js/clients.js"></script>

    

    <script>


if (typeof AcornIcons !== 'undefined') {
  new AcornIcons().replace();
}



      


      $( document ).ready(function() {

          LDevicesSelectONT('<?php echo $iddevice;?>','OLT');

          LONTs('<?php echo $param;?>','<?php echo $iddevice;?>');

       });
       

      $('#selectDevicesONT').change(function() {

        var param=document.getElementById('txtbuscastation').value;
        var iddevice=document.getElementById('selectDevicesONT').value;

       location.href="ONTs.php?param="+param+"&iddevice="+iddevice;

      });
	

            $('#txtbuscastation').keypress(function(event) {
          var keycode = (event.keyCode ? event.keyCode : event.which);
         if(keycode == '13') {
        
		    var param=document.getElementById('txtbuscastation').value;
        var iddevice=document.getElementById('selectDevicesONT').value;

       location.href="ONTs.php?param="+param+"&iddevice="+iddevice;


          document.getElementById("txtbuscastation").select();

    

		
      }
      });


    function selectElement(id, valueToSelect) {    
    let element = document.getElementById(id);
    element.value = valueToSelect;
    }



      
	 

      </script>

  </body>
</html>
