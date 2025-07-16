
<?php include ("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Telemas | Pagos</title>
    <meta
      name="description"
      content="Clientes de Telemas"
    />
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

    <link rel="stylesheet" href="css/vendor/select2.min.css" />

    <link rel="stylesheet" href="css/vendor/select2-bootstrap4.min.css" />

    <link rel="stylesheet" href="css/vendor/bootstrap-datepicker3.standalone.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">



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
          <div class="row">
            <div class="col">
              <!-- Title and Top Buttons Start -->
              <div class="page-title-container">
                <div class="row">
                  <!-- Title Start -->
                  <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">Pagos</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                      <ul class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">CRM</a></li>
                        <li class="breadcrumb-item"><a href="Payments.php">Pagos</a></li>
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
                      <input class="form-control datatable-search" placeholder="Buscar" id="txtbuscapay"  name="txtbuscapay"/>
                      <span class="search-magnifier-icon">
                        <i data-acorn-icon="search"></i>
                      </span>
                      <span class="search-delete-icon d-none">
                        <i data-acorn-icon="close"></i>
                      </span>
                    </div>
                  </div>
                  <!-- Search End -->

                  <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                    <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                      
                    </div>
                    <div class="d-inline-block">
                      
                      

                      <!-- Length Start -->
                      <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableRows" data-childSelector="span">
                        <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                          <span
                            class="btn btn-foreground-alternate dropdown-toggle"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-delay="0"
                            title="Item Count"
                          >
                            10 Items
                          </span>
                        </button>
                        <div class="dropdown-menu shadow dropdown-menu-end">
                          <a class="dropdown-item" href="#">5 Items</a>
                          <a class="dropdown-item active" href="#">10 Items</a>
                          <a class="dropdown-item" href="#">20 Items</a>
                        </div>
                      </div>
                      <!-- Length End -->
                    </div>
                  </div>
                </div>
                <!-- Controls End -->

                <!-- Table Start -->
                <div id="tbl_payments">
                  <div class="card mb-5">
                    <div class="card-body">
                     
                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID Cliente</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Saldo</th>
                                                    <th scope="col">Plan</th>
                                                    <th scope="col">Acciones</th>
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
                 <div id="modal-checkout" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                        <h3 class="modal-title"><strong>Borrar Pagos</strong></h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="page-header text-center"><i class="fa fa-credit-card"></i> <strong></strong></h4>
                                </div>
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="form-group">
                                        <label for="txtcli">Cliente</label>
										<input type="hidden" id="txtidpay" name="txtidpay" value="0">
                                                                                <input type="hidden" id="txtidUCRM" name="txtidUCRM" value="0">
										<input type="hidden" id="txtidcli" name="txtidcli" value="0">
                                        <input type="text" id="txtcli" name="txtcli" class="form-control" placeholder="Full Name" readonly>
                                    </div>
									
                                    <div class="form-group">
										
                                        <label for="txtmetodo">Metodo de Pago</label>
                                        <input type="text" id="txtmetodo" name="txtmetodo" class="form-control" placeholder="Full Name" readonly>

										
								
										
										
                                    </div>
									
									
									
									
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="txtfec">Fecha</label>
                                                <input type="text" id="txtfec" name="txtfec" class="form-control"  placeholder="dd/mm/yyyy" readonly>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="txthora">Hora</label>
                                                <input type="text" id="txthora" name="txthora" class="form-control" placeholder="00:00" readonly>
                                            </div>
                                        </div>
                                    </div>
									
									
									 <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="txtaut"> Autorizacion </label>
                                                <input type="text" id="txtaut" name="txtaut" class="form-control" placeholder="000000" readonly>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="txtmonto"> Monto $</label>
                                                <input type="text" id="txtmonto" name="txtmonto" class="form-control" placeholder="0000.00" readonly>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label for="txtnotas">Notas</label>
                                        <input type="text" id="txtnotas" name="txtnotas" class="form-control" placeholder=". . . " readonly>
                                    </div>
									
								
                                    
                                    <div class="form-group">
                                        <label for="txtjusti"> Justificacion </label>
                                        <input type="text" id="txtjusti" name="txtjusti" class="form-control" placeholder=". . . " >
                                    </div>
									
									
									
									
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-effect-ripple btn-danger" onClick="DeletePayDo();"><i class="fa fa-check"></i> Borrar Pago </button>
                        </div>
                    </form>
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
      
    </div>

    

    

    <div id="ticket"></div>

   

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


    <script src="../js/clients.js"></script>

    <script src="../js/payments.js"></script>

    <script src="../js/printThis.js"></script>

    <script>




        
function DeletePayDo(){
	
	
	
  $.confirm({
                             title: 'Borrar',
                             content: '¿Esta Seguro de Borrar el PAGO?',
                             buttons: {
                                 confirm:{ 
           text:'Borrar',
           btnClass: 'btn-danger',
           action: function () {


   
DeletePay(document.getElementById('txtidpay').value,document.getElementById('txtjusti').value);	

       
                                 }},
                                 cancel: {
           text:'Cancelar',
           btnClass: 'btn-blue',
           action: function () {
             
                                     
                                 },
           }
                             
         }
                         });
       






}


function GetData(idpay, idUCRM, nom, idcli, fecha, hora,notas,aut,monto,metodo){
	
	
  document.getElementById('txtidpay').value=idpay;
document.getElementById('txtidUCRM').value=idUCRM;
document.getElementById('txtidcli').value=idcli;
document.getElementById('txtcli').value=nom;
document.getElementById('txtfec').value=fecha;
document.getElementById('txthora').value=hora;
  document.getElementById('txtnotas').value=notas;
  document.getElementById('txtaut').value=aut;
document.getElementById('txtmonto').value=monto;
  document.getElementById('txtmetodo').value=metodo;
}

      $( document ).ready(function() {

        LPayments('','<?php echo $_GET['idcli'];?>');

       });
	

            $('#txtbuscapay').keypress(function(event) {
          var keycode = (event.keyCode ? event.keyCode : event.which);
         if(keycode == '13') {
        
          LPayments(document.getElementById('txtbuscapay').value,'');

          document.getElementById("txtbuscapay").select();

    

		
      }
      });

	 

      </script>

  </body>
</html>
