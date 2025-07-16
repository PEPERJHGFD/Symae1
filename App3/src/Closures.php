
<?php include ("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Symae | Cierres y NAPs</title>
    <meta
      name="description"
      content="Cierres y NAPs de Telemas"
    />
    
    <?php include ("header.php"); 
    
    
  
    $param=trim($_GET['param']);

   
    
    ?>

<style>
  #map {
    height: 100%;
  }
</style>




  </head>

  <body >
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
                    <h1 class="mb-0 pb-0 display-4" id="title">Cierres y NAPs</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                      <ul class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Network</a></li>
                        <li class="breadcrumb-item"><a href="Closures.php">Cierres y NAPs</a></li>
                      </ul>
                    </nav>
                  </div>
                  <!-- Title End -->

                  <!-- Top Buttons Start -->
                  <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <!-- Add New Button Start -->
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable"  data-bs-toggle="modal" data-bs-target="#modal-aeClosure" id="addClosure" onClick="ClearO();">
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
                      <input class="form-control datatable-search" placeholder="Buscar" id="txtbuscaclosure"  name="txtbuscaclosure"/>
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

               

                <div class="row">
            <div class="col-12 col-xxl">
              <div class="row">
                <!-- Activity Start -->
                <div class="col-12 w-30">
                  
                  <div class="card sh-80">
                    <div class="card-body scroll-out h-100">
                      <div class="scroll h-100">
                        
                      
                        <div id="tbl_closures">
                          <div class="card mb-5">
                            <div class="card-body">
                     
                                <table class="table table-hover" >
                                            <thead>
                                                <tr>
                                                   
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Modelo</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col"></th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                            </tbody>
                                  </table>

                             </div>
                          </div>
                        </div>
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Activity End -->

                <!-- Recent Reviews Start -->
                <div class="col-12 w-70 ">
                  
                  <div class="card sh-80">
                    <div class="card-body mb-n2 scroll-out h-100">
                      <div class="scroll h-100">
                        
                        
                      <div id="map"></div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Recent Reviews End -->
              </div>
            </div>

            
          </div>




                        <!--  Checkout Modal -->
                        <div id="modal-aeClosure" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                         
                                  <div class="modal-header">
                                    <h3 class="modal-title"><strong>Empalmes</strong></h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>

                                  <div class="modal-body">


                                  <!-- Responsive Tabs Start -->
                            <section class="scroll-section" id="responsiveTabs">

                            <div class="card mb-3">
                                    <div class="card-header border-0 pb-0">
                                        <ul class="nav nav-tabs nav-tabs-line card-header-tabs responsive-tabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#first" role="tab" type="button" aria-selected="true">General</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#second" role="tab" type="button" aria-selected="false">Notas</button>
                                            </li>

                                            
                                           
                                            
                                            
                                            
                                            <!-- An empty list to put overflowed links -->
                                            <li class="nav-item dropdown ms-auto pe-0 d-none responsive-tab-dropdown">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mt-2" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-acorn-icon="more-horizontal"></i>
                                                </button>
                                                <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="first" role="tabpanel">

                                                <!-- Devices Start -->


                  <form class="tooltip-end-top" id="devicesForm" >
                     

                        <div class="row g-3">

                          <div class="col-md-8">

                                <input  name="idClosure" id="idClosure" type="hidden" value=""/>

                            <label class="mb-3 top-label">
                              <input class="form-control" name="nameClosure" id="nameClosure" disabled/>
                              <span>NOMBRE</span>
                            </label>
                          </div>
                          

                        </div>

                        <div class="row g-3">

                        <div class="col-md-5">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="serialClosure" id="serialClosure"/>
                              <span>SERIE</span>
                            </label>
                          </div>

                            <div class="col-md-3">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="typeClosure" id="typeClosure">
                                <option value="CIERRE">CIERRE</option>
                                <option value="NAP">NAP</option>
                                <option value="OTRO">OTRO</option>
                               
                              </select>
                              <span>TIPO</span>
                            </div>
                          </div>

                          

                          <div class="col-md-2">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="ptosClosure" id="ptosClosure">
                                <option value="0">0</option>
                                <option value="4">4</option>
                                <option value="8">8</option>
                                <option value="16">16</option>
                                <option value="32">32</option>
                                
                              </select>
                              <span>PUERTOS</span>
                            </div>
                          </div>

                         
                          
                        </div>

                        <div class="row g-3">
                          
                          <div class="col-md-3">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="estaClosure" id="estaClosure">
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Puebla" >Puebla</option>
                              </select>
                              <span>ESTADO</span>
                            </div>
                          </div>


                          <div class="col-md-4">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="mpioClosure" id="mpioClosure">
                                <option value="Acatlan">Acatlan</option>
                                <option value="Cuautepec" >Cuautepec</option>
                                <option value="Tulancingo" >Tulancingo</option>
                                <option value="Santiago" >Santiago</option>
                              </select>
                              <span>MUNICIPIO</span>
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="zoneClosure" id="zoneClosure">
                                <option label="Alcholoya">Alcholoya</option>
                                <option value="Almoloya" >Almoloya</option>
                                <option value="Agustin_Olvera" >Agustin_Olvera</option>
                                <option value="Benito_Juarez" >Benito_Juarez</option>
                                <option label="Centro">Centro</option>
                                <option value="Chautenco" >Chautenco</option>
                                <option value="Encinillos" >Encinillos</option>
                                <option value="El_Miagro" >El_Miagro</option>
                                <option value="Totoapa" >Totoapa</option>
                                <option value="Totoapita_Herradura" >Totoapita_Herradura</option>
                                <option value="Lucero" >Lucero</option>
                                <option value="Metepec_1ro" >Metepec_1ro</option>
                                <option value="Metepec_2do" >Metepec_2do</option>
                                <option value="Lomas" >Lomas</option>
                                <option value="Los_Migueles" >Los_Migueles</option>
                                <option value="San_Dionisio" >San_Dionisio</option>
                                <option value="28_de_Mayo" >28_de_Mayo</option>
                                <option value="Rincones_de_la_Hacienda" >Rincones_de_la_Hacienda</option>
                                <option value="Jaltepec" >Jaltepec</option>
                                <option value="Carrillo_Puerto" >Carrillo_Puerto</option>
                                <option value="Los_Arcos" >Los_Arcos</option>
                                <option value="San_Juan_Hueyapan" >San_Juan_Hueyapan</option>
                                <option value="Guadalupe_Victoria" >Guadalupe_Victoria</option>
                                <option value="La_Cima" >La_Cima</option>

                              </select>
                              <span>ZONA</span>
                            </div>
                          </div>

                          

                          

                        </div>
                        

                        <div class="row g-3">
                          
                          <div class="col-md-5">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="latClosure" id="latClosure"/>
                              <span>LATITUD</span>
                            </label>
                          </div>


                          <div class="col-md-5">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="lonClosure" id="lonClosure"/>
                              <span>LINGITUD</span>
                            </label>
                          </div>


                          

                          
                        </div>


                        
                      
                  </form>
                <!--Devices End -->

                                                


                 </div>

                  <div class="tab-pane fade" id="second" role="tabpanel">

              <!-- Devices Start -->

                  <form class="tooltip-end-top" id="devicesForm2" >

                  <div class="row g-3">
                          
                          <div class="col-md-10">
                            <label class="mb-3 top-label">
                            <textarea class="form-control" rows="11" name="notesClosure" id="notesClosure"></textarea>
                            <span>NOTAS</span>
                              
                            </label>
                          </div>

                          
                        </div>

                     

                     

                   
                </form>
             
              <!--Devices End -->
                                  
             
             
                                            


                  </div>


                  

                                           
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                        
                                
                            </section>
                            <!-- Responsive Tabs with Line Title End -->

                                  </div>

                                
                                <div class="modal-footer">
                            
                                <button class="btn btn-icon btn-icon-end btn-success" onClick="SaveClos();">
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


    <script src="../js/closures.js"></script>

    <script src="../js/clients.js"></script>

    

    <script>


if (typeof AcornIcons !== 'undefined') {
  new AcornIcons().replace();
}



      function ClearO(){


        document.getElementById('idClosure').value="";
        document.getElementById('nameClosure').value="";
        document.getElementById('serialClosure').value="";
        document.getElementById('notesClosure').value="";
        

      }


      function GetDataClos(idClosure,nameClosure,serialClosure,typeClosure,ptosClosure,estaClosure,mpioClosure,zoneClosure,latClosure,lonClosure,notesClosure){
	
      
	
      document.getElementById('idClosure').value=idClosure;
      document.getElementById('nameClosure').value=nameClosure;
      document.getElementById('serialClosure').value=serialClosure;

      $("#typeClosure").val(typeClosure).change();
      $("#ptosClosure").val(ptosClosure).change();
      $("#estaClosure").val(estaClosure).change();
      $("#mpioClosure").val(mpioClosure).change();
      $("#zoneClosure").val(zoneClosure).change();

      document.getElementById('latClosure').value=latClosure;
      document.getElementById('lonClosure').value=lonClosure;
      document.getElementById('notesClosure').value=notesClosure.replaceAll("==","\n");
     
  
      

 


}



      $( document ).ready(function() {

          
        LClosures('<?php echo $param;?>');

       });
       

            $('#txtbuscaclosure').keypress(function(event) {
          var keycode = (event.keyCode ? event.keyCode : event.which);
         if(keycode == '8') {
        
		    var param=document.getElementById('txtbuscaclosure').value;
        

       location.href="Closures.php?param="+param;


          document.getElementById("txtbuscaclosure").select();

    

		
      }
      });

      function FindClosure(Name){

        location.href="Closures.php?param="+Name;

      }


    function selectElement(id, valueToSelect) {    
    let element = document.getElementById(id);
    element.value = valueToSelect;
    }



      function SaveClos(){

        
          idClosure=document.getElementById('idClosure').value;
          nameClosure=document.getElementById('nameClosure').value;
          serialClosure=document.getElementById('serialClosure').value;
          typeClosure=document.getElementById('typeClosure').value;
          ptosClosure=document.getElementById('ptosClosure').value;
          estaClosure=document.getElementById('estaClosure').value;
          mpioClosure=document.getElementById('mpioClosure').value;
          zoneClosure=document.getElementById('zoneClosure').value;
          latClosure=document.getElementById('latClosure').value;
          lonClosure=document.getElementById('lonClosure').value;
          notesClosure=document.getElementById('notesClosure').value;

    

          

  $.confirm({
                             title: 'Registrar',
                             content: '¿Esta Seguro de Registrar el Cierre?',
                             buttons: {
                                 confirm:{ 
           text:'Registrar',
           btnClass: 'btn-success',
           action: function () {

   
SaveClosure(idClosure,nameClosure,serialClosure,typeClosure,ptosClosure,estaClosure,mpioClosure,zoneClosure,latClosure,lonClosure,notesClosure);	

       
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

	 



///// crear mapa 
    var map_data;
  	var map;
  	var infoWindow;

	  
 ///console.log(fetch_data(""));


 map_data = jQuery.parseJSON(fetch_data('<?php echo $param;?>'));



function initMap(param) {
	const myLatLng = { lat: 20.144722689815463, lng: -98.4389917547824 };
	const map = new google.maps.Map(document.getElementById("map"), {
	  zoom: 12,
	  center: myLatLng,
    mapTypeId: 'hybrid'
	});


var image;
 
  infoWindow = new google.maps.InfoWindow();
    //Adding Markers
    for(var i=0;  i<map_data.length; i++){
      var data = map_data[i];

      if(data.Type.trim()=="NAP"){

         image ="img/icons/icons8-marcador-16.png";

      }else{

         image ="img/icons/icons8-capas-16.png";

      }

      latLng = new google.maps.LatLng(data.Lat, data.Lon);

      var marker = new google.maps.Marker({
        position: latLng,
        map: map,
        icon: image,
        title: data.Name
      });

      (function (marker, data) {
        google.maps.event.addListener(marker, "click", function (e) {
          //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
          infoWindow.setContent("<div class = 'marker-desc'>" + data.Notes + "</div>");
          infoWindow.open(map, marker);
        });
      })(marker, data);

    }


  }


  
  window.initMap = initMap;


      </script>


<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5VV4z8tv-6N9nHtl99iwlfjFUEVY-8-I&callback=initMap&v=weekly"
      defer
    ></script>


    
  </body>
</html>
