
<?php include ("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Telemas | Equipos</title>
    <meta
      name="description"
      content="Equipos de Telemas"
    />
    
    <?php include ("header.php"); 
    
    
    $param=trim($_GET['param']);
    $idsite=($_GET['idsite']);

    if($idsite==0){
      $idsite='0';
    }
    
    ?>
    

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
                    <h1 class="mb-0 pb-0 display-4" id="title">Equipos</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                      <ul class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Network</a></li>
                        <li class="breadcrumb-item"><a href="Devices.php">Equipos</a></li>
                      </ul>
                    </nav>
                  </div>
                  <!-- Title End -->

                  <!-- Top Buttons Start -->
                  <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <!-- Add New Button Start -->
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable"  data-bs-toggle="modal" data-bs-target="#modal-aeDevice" id="addDevice" onClick="ClearO();">
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
                      <input class="form-control datatable-search" placeholder="Buscar" id="txtbuscadevice"  name="txtbuscadevice"/>
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
                    
                    
                              <select class="form-control" name="siteDev1" id="siteDev1" >
                                
                              
                                
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
                <div id="tbl_devices">
                  <div class="card mb-5">
                    <div class="card-body">
                     
                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID </th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Marca</th>
                                                    <th scope="col">Modelo</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Admin IP</th>
                                                    <th scope="col">Admin Port</th>
                                                    <th scope="col">Sitio</th>
                                                    <th scope="col"></th>
                                                    
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
                        <div id="modal-aeDevice" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                         
                                  <div class="modal-header">
                                    <h3 class="modal-title"><strong>Equipos</strong></h3>
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
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#second" role="tab" type="button" aria-selected="false">Network</button>
                                            </li>

                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#third" role="tab" type="button" aria-selected="false">Wireless</button>
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

                          <div class="col-md-10">
                                <input  name="idDev" id="idDev" type="hidden" value=""/>
                            <label class="mb-3 top-label">
                              <input class="form-control" name="nameDev" id="nameDev"/>
                              <span>NOMBRE DEL DISPOSITIVO</span>
                            </label>
                          </div>
                          

                        </div>

                        <div class="row g-3">

                            <div class="col-md-5">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="marcaDev" id="marcaDev">
                                <option label="&nbsp;"></option>
                                <option value="Ubiquiti">Ubiquiti</option>
                                <option value="Mikrotik">Mikrotik</option>
                                <option value="Huawei">Huawei</option>
                                <option value="Cisco">Cisco</option>
                                <option value="Mimosa">Mimosa</option>
                                <option value="Cabium">Cabium</option>
                                <option value="VSOL">VSOL</option>
                              </select>
                              <span>MARCA</span>
                            </div>
                          </div>

                          <div class="col-md-5">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="modeloDev" id="modeloDev"/>
                              <span>MODELO</span>
                            </label>
                          </div>
                          
                        </div>

                        <div class="row g-3">
                          
                          <div class="col-md-4">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="typeDev" id="typeDev">
                                <option label="&nbsp;"></option>
                                <option value="Router">Router</option>
                                <option value="Switch" >Switch</option>
                                <option value="OLT" >OLT</option>
                                <option value="AccessPoint_PTMP" >AccessPoint_PTMP</option>
                                <option value="Station_PTMP" >Station_PTMP</option>
                                <option value="AccessPoint_PTP" >AccessPoint_PTP</option>
                                <option value="Station_PTP" >Station_PTP</option>
                              </select>
                              <span>TIPO</span>
                            </div>
                          </div>


                          <div class="col-md-4">
                            <div class="mb-3 top-label">
                              <select class="form-control" name="siteDev" id="siteDev">
                                
                              <option></option>
                                
                              </select>
                              <span>SITIO</span>
                            </div>
                          </div>


                          <div class="col-md-2">
                          
                                        <div class="top-label custom-control-container">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" id="isactiveDev" checked/>
                                            </div>
                                            <span>ACTIVO</span>
                                        </div>

                          </div>

                          

                          

                        </div>
                        

                        <div class="row g-3">
                          
                          <div class="col-md-4">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="useradminDev" id="useradminDev"/>
                              <span>USER ADMIN</span>
                            </label>
                          </div>


                          <div class="col-md-4">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="passadminDev" id="passadminDev"/>
                              <span>PASS ADMIN</span>
                            </label>
                          </div>


                          <div class="col-md-2">
                          
                                        <div class="top-label custom-control-container">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" id="isCriticalDev" />
                                            </div>
                                            <span>EQUIPO CRITICO</span>
                                        </div>

                          </div>

                          
                        </div>


                        <div class="row g-3">
                          
                          <div class="col-md-10">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="noteDev" id="noteDev"/>
                              <span>NOTAS</span>
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

                       <div class="col-md-4">
                         <label class="mb-3 top-label">
                           <input class="form-control" name="ipadminDev" id="ipadminDev"/>
                           <span>IP DE ADMINISTRACION</span>
                         </label>
                       </div>

                       <div class="col-md-4">
                         <label class="mb-3 top-label">
                           <input class="form-control" name="portadminDev" id="portadminDev"/>
                           <span>PUERTO DE ADMINISTRACION</span>
                         </label>
                       </div>


                       <div class="col-md-4">
                         <div class="mb-3 top-label">
                           <select class="form-control" name="adminDev" id="adminDev">
                             <option label="&nbsp;"></option>
                             <option value="HTTP">HTTP</option>
                             <option value="Winbox">Winbox</option>
                             <option value="Telnet">Telnet</option>
                           </select>
                           <span>ADMINISTRACION VIA</span>
                         </div>
                       </div>
                       

                     </div>

                     <div class="row g-3">

                          <div class="col-md-2">
                       
                                     <div class="top-label custom-control-container">
                                         <div class="form-check form-switch">
                                             <input type="checkbox" class="form-check-input" id="apirestDev" name="apirestDev" />
                                         </div>
                                         <span>API REST</span>
                                     </div>

                          </div>

                        
                       <div class="col-md-5">
                         <label class="mb-3 top-label">
                           <input class="form-control" name="ipapiDev" id="ipapiDev"/>
                           <span>IP API REST</span>
                         </label>
                       </div>

                       <div class="col-md-5">
                         <label class="mb-3 top-label">
                           <input class="form-control" name="portapiDev" id="portapiDev"/>
                           <span>PUERTO API REST</span>
                         </label>
                       </div>
                       
                     </div>

                     <div class="row g-3">
                       
                     <div class="col-md-3">
                         <label class="mb-3 top-label">
                           <input class="form-control" name="userapiDev" id="userapiDev"/>
                           <span>USER API REST</span>
                         </label>
                       </div>


                       <div class="col-md-3">
                         <label class="mb-3 top-label">
                           <input class="form-control" name="passapiDev" id="passapiDev"/>
                           <span>PASS API REST</span>
                         </label>
                       </div>


                       <div class="col-md-2">
                       
                                     <div class="top-label custom-control-container">
                                         <div class="form-check form-switch">
                                             <input type="checkbox" class="form-check-input" id="staticserverDev" />
                                         </div>
                                         <span>STATIC SERVER</span>
                                     </div>

                       </div>

                       <div class="col-md-2">
                       
                                     <div class="top-label custom-control-container">
                                         <div class="form-check form-switch">
                                             <input type="checkbox" class="form-check-input" id="pppoeserverDev" />
                                         </div>
                                         <span>PPPOE SERVER</span>
                                     </div>

                       </div>

                       

                       

                     </div>
                     

                     <div class="row g-3">
                       
                     <h5 class="card-title">OSPF</h5>

                     <div class="col-md-3">
                         <label class="mb-3 top-label">
                           <input class="form-control" name="ipospfDev" id="ipospfDev"/>
                           <span>IP ADDRESS OSPF</span>
                         </label>
                       </div>


                       <div class="col-md-3">
                         <label class="mb-3 top-label">
                           <input class="form-control" name="networkospfDev" id="networkospfDev"/>
                           <span>NETWORK OSPF</span>
                         </label>
                       </div>

                       <div class="col-md-3">
                         <label class="mb-3 top-label">
                           <input class="form-control" name="idrouterospfDev" id="idrouterospfDev"/>
                           <span>ID ROUTER OSPF</span>
                         </label>
                       </div>

                       <div class="col-md-3">
                         <label class="mb-3 top-label">
                           <input class="form-control" name="loopbackospfDev" id="loopbackospfDev"/>
                           <span>LOOPBACK OSPF</span>
                         </label>
                       </div>



                       
                     </div>

                   
               </form>
             <!--Devices End -->
                                  
             
             
                                            


                  </div>


                  <div class="tab-pane fade" id="third" role="tabpanel">

                  <form class="tooltip-end-top" id="devicesForm2" >
                     

                     <div class="row g-3">

                     <div class="col-md-6">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="ssidDev" id="ssidDev"/>
                              <span>SSID / LINK NAME</span>
                            </label>
                          </div>


                          <div class="col-md-4">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="frequencyDev" id="frequencyDev"/>
                              <span>FREQUENCY MHZ</span>
                            </label>
                          </div>

                     


                     </div>


                     <div class="row g-3">

                     <div class="col-md-6">
                            <label class="mb-3 top-label">
                              <input class="form-control" name="ssidKeyDev" id="ssidKeyDev"/>
                              <span>SSID KEY</span>
                            </label>
                          </div>
                     </div>


                    

                    </form>

             


            </div>

                                           
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                        
                                
                            </section>
                            <!-- Responsive Tabs with Line Title End -->


                                  

                                
                                  
                                  
                                
                                  </div>

                                
                                <div class="modal-footer">
                            
                                <button class="btn btn-icon btn-icon-end btn-success" onClick="SaveDev();">
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


    <script src="../js/devices.js"></script>

    <script src="../js/clients.js"></script>

    

    <script>


if (typeof AcornIcons !== 'undefined') {
  new AcornIcons().replace();
}



      function ClearO(){


        document.getElementById('idDev').value="";
        document.getElementById('nameDev').value="";
        document.getElementById('marcaDev').value="";
        document.getElementById('modeloDev').value="";
        document.getElementById('typeDev').value="";
        document.getElementById('siteDev').value="";
          
        document.getElementById('isactiveDev').checked=true;
            

        document.getElementById('isCriticalDev').checked=false;
           

        document.getElementById('useradminDev').value="";
        document.getElementById('passadminDev').value="";
        document.getElementById('noteDev').value="";

        document.getElementById('ipadminDev').value="";
        document.getElementById('portadminDev').value="";
        document.getElementById('adminDev').value="";

        document.getElementById('apirestDev').checked=false;
           

        document.getElementById('ipapiDev').value="";
        document.getElementById('portapiDev').value="";
        document.getElementById('userapiDev').value="";
        document.getElementById('passapiDev').value="";

        document.getElementById('staticserverDev').checked=false;
            

        document.getElementById('pppoeserverDev').checked=false;
            


        document.getElementById('ipospfDev').value="";
        document.getElementById('networkospfDev').value="";
        document.getElementById('idrouterospfDev').value="";
        document.getElementById('loopbackospfDev').value="";

        document.getElementById('ssidDev').value="";
        document.getElementById('frequencyDev').value="";
        document.getElementById('ssidKeyDev').value="";



      }


      $( document ).ready(function() {

          LSitesSelect('<?php echo $idsite;?>');

          LDevices('<?php echo $param;?>','<?php echo $idsite;?>');

       });
       

      $('#siteDev1').change(function() {

        var param=document.getElementById('txtbuscadevice').value;
        var idsite=document.getElementById('siteDev1').value;

       location.href="Devices.php?param="+param+"&idsite="+idsite;
      
      });
	

            $('#txtbuscadevice').keypress(function(event) {
          var keycode = (event.keyCode ? event.keyCode : event.which);
         if(keycode == '13') {
        
		    var param=document.getElementById('txtbuscadevice').value;
        var idsite=document.getElementById('siteDev1').value;

       location.href="Devices.php?param="+param+"&idsite="+idsite;


          document.getElementById("txtbuscadevice").select();

    

		
      }
      });


      function selectElement(id, valueToSelect) {    
    let element = document.getElementById(id);
    element.value = valueToSelect;
    }



      function SaveDev(){

          isactiveDev=1;
          isCriticalDev=0;
          apirestDev=0;
          staticserverDev=0;
          pppoeserverDev=0;

          


          idDev=document.getElementById('idDev').value;
          nameDev=document.getElementById('nameDev').value;
          marcaDev=document.getElementById('marcaDev').value;
          modeloDev=document.getElementById('modeloDev').value;
          typeDev=document.getElementById('typeDev').value;
          siteDev=document.getElementById('siteDev').value;
          
          if(document.getElementById('isactiveDev').checked){
            isactiveDev=1;
          }else{
            isactiveDev=0;
          }

          if(document.getElementById('isCriticalDev').checked){
            isCriticalDev=1;
          }else{
            isCriticalDev=0;
          }

          useradminDev=document.getElementById('useradminDev').value;
          passadminDev=document.getElementById('passadminDev').value;
          noteDev=document.getElementById('noteDev').value;

          ipadminDev=document.getElementById('ipadminDev').value;
          portadminDev=document.getElementById('portadminDev').value;
          adminDev=document.getElementById('adminDev').value;

          if(document.getElementById('apirestDev').checked){
            apirestDev=1;
          }else{
            apirestDev=0;
          }

          ipapiDev=document.getElementById('ipapiDev').value;
          portapiDev=document.getElementById('portapiDev').value;
          userapiDev=document.getElementById('userapiDev').value;
          passapiDev=document.getElementById('passapiDev').value;

          if(document.getElementById('staticserverDev').checked){
            staticserverDev=1;
          }else{
            staticserverDev=0;
          }

          if(document.getElementById('pppoeserverDev').checked){
            pppoeserverDev=1;
          }else{
            pppoeserverDev=0;
          }


          ipospfDev=document.getElementById('ipospfDev').value;
          networkospfDev=document.getElementById('networkospfDev').value;
          idrouterospfDev=document.getElementById('idrouterospfDev').value;
          loopbackospfDev=document.getElementById('loopbackospfDev').value;

          ssidDev=document.getElementById('ssidDev').value;
          frequencyDev=document.getElementById('frequencyDev').value;
          ssidKeyDev=document.getElementById('ssidKeyDev').value;



      
          

	
	
  $.confirm({
                             title: 'Registrar',
                             content: '¿Esta Seguro de Registrar el EQUIPO?',
                             buttons: {
                                 confirm:{ 
           text:'Registrar',
           btnClass: 'btn-success',
           action: function () {

   
SaveDevice(idDev,nameDev,marcaDev,modeloDev,typeDev,siteDev,isactiveDev,useradminDev,passadminDev,noteDev,ipadminDev,portadminDev,adminDev,apirestDev,ipapiDev,portapiDev,userapiDev,passapiDev,staticserverDev,pppoeserverDev,ipospfDev,networkospfDev,idrouterospfDev,loopbackospfDev,isCriticalDev,ssidDev,frequencyDev,ssidKeyDev);	

       
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
