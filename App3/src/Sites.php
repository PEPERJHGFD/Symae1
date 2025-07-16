
<?php include ("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Telemas | Sitios</title>
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
                    <h1 class="mb-0 pb-0 display-4" id="title">Sitios</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                      <ul class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Network</a></li>
                        <li class="breadcrumb-item"><a href="Sites.php">Sitios</a></li>
                      </ul>
                    </nav>
                  </div>
                  <!-- Title End -->

                  <!-- Top Buttons Start -->
                  <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <!-- Add New Button Start -->
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable"  data-bs-toggle="modal" data-bs-target="#modal-aeSite" id="addSite">
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
                    <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                      <input class="form-control datatable-search" placeholder="Buscar" id="txtbuscasite"  name="txtbuscasite"/>
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
                      
                      

                  
                    </div>
                  </div>
                </div>
                <!-- Controls End -->

                <!-- Table Start -->
                <div id="tbl_sites">
                  <div class="card mb-5">
                    <div class="card-body">
                     
                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID </th>
                                                    <th scope="col">Sitio</th>
                                                    <th scope="col">Localidad</th>
                                                    <th scope="col">Coordenadas</th>
                                                    <th scope="col">Tipo</th>
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
                        <div id="modal-aeSite" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                         
                                  <div class="modal-header">
                                    <h3 class="modal-title"><strong>Sitios</strong></h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>

                                  <div class="modal-body">

                                  <!-- Personal Start -->
                <section class="scroll-section" id="sites">
                  <h2 class="small-title">Agregar Sitio</h2>
                  <form class="tooltip-end-top" id="sitesForm" >
                    <div class="card mb-5">
                      <div class="card-body">
                      <input  name="idSite" id="idSite" type="hidden" value=""/>
                        <div class="row g-3">
                          <div class="col-md-6">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="nameSite" id="nameSite"/>
                              <span>NOMBRE DEL SITIO</span>
                            </label>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="typeSite" id="typeSite">
                                <option label="&nbsp;"></option>
                                <option value="Wireless">Wireless</option>
                                <option value="Fibra Optica">Fibra Optica</option>
                                <option value="Wireless y Fibra Optica">Wireless y Fibra Optica</option>
                              </select>
                              <span>TIPO</span>
                            </div>
                          </div>

                        </div>
                        <div class="row g-3">
                          <div class="col-md-5">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="locaSite" id="locaSite"/>
                              <span>LOCALIDAD</span>
                            </label>
                          </div>
                          <div class="col-md-5">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="mpioSite" id="mpioSite"/>
                              <span>MUNICIPIO</span>
                            </label>
                          </div>
                        </div>

                        <div class="row g-3">
                          
                          <div class="col-md-6">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="edoSite" id="edoSite">
                                <option label="&nbsp;"></option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Puebla" >Puebla</option>
                              </select>
                              <span>ESTADO</span>
                            </div>
                          </div>
                        </div>
                        <div class="row g-3">
                          
                        <div class="col-md-4">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="latSite" id="latSite"/>
                              <span>LATITUD</span>
                            </label>
                          </div>
                          <div class="col-md-4">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="lonSite" id="lonSite"/>
                              <span>LONGITUD</span>
                            </label>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </form>
                </section>
                <!-- Personal End -->
                                  
                                
                                  </div>

                                
                                <div class="modal-footer">
                            
                                <button class="btn btn-icon btn-icon-end btn-success" onClick="SaveSite1();">
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


    <script src="../js/sites.js"></script>

    

    <script>

function GetData(idSite, nameSite, typeSite, locaSite, mpioSite, edoSite,latSite,lonSite){
	
	
  document.getElementById('idSite').value=idSite;
document.getElementById('nameSite').value=nameSite;


document.getElementById('locaSite').value=locaSite;
document.getElementById('mpioSite').value=mpioSite;

document.getElementById('latSite').value=latSite;
  document.getElementById('lonSite').value=lonSite;

 
  $("#edoSite").val(edoSite).change();

  $("#typeSite").val(typeSite).change();

 


}


      $( document ).ready(function() {

          LSites('');
          

       });
	

            $('#txtbuscasite').keypress(function(event) {
          var keycode = (event.keyCode ? event.keyCode : event.which);
         if(keycode == '13') {
        
		      LSites(document.getElementById('txtbuscasite').value);


          document.getElementById("txtbuscasite").select();

    

		
      }
      });


      function SaveSite1(){
	
	
	
  $.confirm({
                             title: 'Registrar',
                             content: '¿Esta Seguro de Registrar el SITIO?',
                             buttons: {
                                 confirm:{ 
           text:'Registrar',
           btnClass: 'btn-success',
           action: function () {

   
SaveSite(document.getElementById('idSite').value,document.getElementById('nameSite').value,document.getElementById('typeSite').value,document.getElementById('locaSite').value,document.getElementById('mpioSite').value,document.getElementById('edoSite').value,document.getElementById('latSite').value,document.getElementById('lonSite').value);	

       
                                 }},
                                 cancel: {
           text:'Cancelar',
           btnClass: 'btn-danger',
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
