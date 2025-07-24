<?php include("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Telemas | Clientes</title>
  <meta name="description" content="Clientes de Telemas" />

  <?php include("header.php"); ?>


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
                  <h1 class="mb-0 pb-0 display-4" id="title">Clientes</h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">CRM</a></li>
                      <li class="breadcrumb-item"><a href="Customers.php">Clientes</a></li>
                    </ul>
                  </nav>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                  <!-- Add New Button Start -->
                  <!-- Reemplaza tu botón actual con este -->
                    <button type="button" 
                            class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable"
                            onclick="window.location.href='add-client.php'">
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
                    <input class="form-control datatable-search" placeholder="Buscar" id="txtbuscacli"
                      name="txtbuscacli" />
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
                    <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableRows"
                      data-childSelector="span">
                      <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-bs-offset="0,3">
                        <span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip"
                          data-bs-placement="top" data-bs-delay="0" title="Item Count">
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
              <div id="tbl_clients">
                <div class="card mb-5">
                  <div class="card-body">

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">ID Cliente</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Saldo</th>
                          <th scope="col">Planes de Servicio</th>
                          <th scope="col">Pagos</th>
                          <th scope="col">Status</th>
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
                <div id="spinner-div2" class="pt-5">
                  <div class="spinner-border text-primary" role="status"></div>
                </div>
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <form>
                      <div class="modal-header">
                        <h3 class="modal-title"><strong>Registrar Pagos</strong></h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">


                          <div class="col-sm-6 col-sm-offset-3">
                            <div class="w-100">
                              <label class="form-label">Cliente</label>
                              <input type="hidden" id="txtidUCRM" name="txtidUCRM" value="0">
                              <input type="hidden" id="txtidcli" name="txtidcli" value="0">
                              <input class="form-control" type="text" id="txtcli" name="txtcli" class="form-control"
                                placeholder="Full Name" readonly>
                            </div>

                            <div class="w-100">

                              <label class="form-label">Metodo de Pago</label>


                              <select id="Select_Method">

                                <option></option>
                                <!-- Required for data-placeholder attribute to work with Chosen plugin -->

                              </select>

                            </div>

                            <div class="w-100">
                              <div class="row">
                                <div class="col-xs-6">
                                  <label class="form-label">Fecha</label>
                                  <input type="text" id="txtfec" name="txtfec" class="form-control "
                                    data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="col-xs-6">
                                  <label class="form-label">Hora</label>
                                  <input type="text" id="txthora" name="txthora" class="form-control"
                                    placeholder="00:00">
                                </div>
                              </div>
                            </div>


                            <div class="w-100">
                              <div class="row">
                                <div class="col-xs-6">
                                  <label class="form-label"> Autorizacion </label>
                                  <input type="text" id="txtaut" name="txtaut" class="form-control"
                                    placeholder="000000">
                                </div>
                                <div class="col-xs-6">
                                  <label class="form-label"> Monto $</label>
                                  <input type="text" id="txtmonto" name="txtmonto" class="form-control"
                                    placeholder="0000.00">
                                </div>
                              </div>
                            </div>


                            <div class="w-100">
                              <label class="form-label">Notas</label>
                              <input type="select" id="txtnotas" name="txtnotas" class="form-control"
                                placeholder=". . . ">
                            </div>

                          </div>

                        </div>
                      </div>
                      <div class="modal-footer">

                        <button type="button" class="btn btn-effect-ripple btn-success" onClick="Save();"><i
                            class="fa fa-check"></i> Registrar Pago </button>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- END Checkout Modal -->


              <!--  Checkout Status -->
              <div id="modal-status" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

                <div id="spinner-div2" class="pt-5">
                  <div class="spinner-border text-primary" role="status"></div>
                </div>

                <div class="modal-dialog modal-lg">
                  <div class="modal-content">


                    <div class="modal-header">
                      <h3 class="modal-title"><strong><span id="statusClientID"></span></strong></h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                      <div class="row">
                        <div id="tblstatusClient"></div>

                        <table style="font-size: 15px; padding: 10px;">
                          <tr>
                            <th>STATUS</th>
                            <td><span class="badge rounded-pill bg-outline-success">Activo</span><span
                                class="badge rounded-pill bg-outline-warning">Suspendido</span></td>
                          </tr>

                          <tr>
                            <th>MODE</th>
                            <td>STATIC - 10.3.12.44 <i class="text-success bi-globe icon-20"></i><i
                                class="text-danger bi-globe icon-20"></i></td>
                          </tr>

                          <tr>
                            <th>CPE </th>
                            <td>LiteBeam 5AC - E0:63:DA:FA:6F:93 <i
                                class="text-success bi-check-circle-fill icon-20"></i> <i
                                class="text-danger bi-x-circle-fill icon-20"></i></td>
                          </tr>

                          <tr>
                            <th>SIGNAL </th>
                            <td>-62 dBm dBm / -62 dBm dBm <i class="text-success bi-reception-4 icon-20"></i><i
                                class="text-danger bi-reception-0 icon-20"></i></td>
                          </tr>

                          <tr>
                            <th>ACCESS POINT </th>
                            <td> DriverMedia_SEC_Aca01 </td>
                          </tr>

                          <tr>
                            <th>SITE </th>
                            <td> Acatlan </td>
                          </tr>

                        </table>



                      </div>

                    </div>

                    <div class="modal-footer">


                    </div>

                  </div>
                </div>
              </div>
              <!-- END Checkout Status -->










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
<!-- Script de prueba para la simulación -->
 
  <script src="../js/mock-data.js"></script>

  <script>
      jQuery('#txtfec').datepicker();

      function GetStatus(idUCRM, nom, idcli, tipo) {
          document.getElementById('statusClientID').innerHTML = nom;
          
          if (tipo == '2') {
              GetStatusFiber(idUCRM, idcli);
          } else {
              GetStatusStatic(idUCRM, idcli);
          }
      }

      function Save() {
          $.confirm({
              title: 'Registrar',
              content: '¿Esta Seguro de Registrar el PAGO?',
              buttons: {
                  confirm: {
                      text: 'Registrar',
                      btnClass: 'btn-success',
                      action: function () {
                          SavePay(
                              document.getElementById('txtidUCRM').value, 
                              document.getElementById('txtidcli').value, 
                              document.getElementById('Select_Method').value, 
                              document.getElementById('txtfec').value, 
                              document.getElementById('txthora').value, 
                              document.getElementById('txtaut').value, 
                              document.getElementById('txtmonto').value, 
                              document.getElementById('txtnotas').value, 
                              document.getElementById('txtcli').value
                          );
                      }
                  },
                  cancel: {
                      text: 'Cancelar',
                      btnClass: 'btn-danger',
                      action: function () {
                          // Cancelar
                      }
                  }
              }
          });
      }

      function GetData(idUCRM, nom, idcli) {
          var hoy = new Date();
          var m = hoy.getMonth() + 1;
          var mes = (m < 10) ? '0' + m : m;
          var hh = hoy.getDate();
          var hho = (hh < 10) ? '0' + hh : hh;

          var fecha = hho + "/" + mes + "/" + hoy.getFullYear();
          var hora = hoy.getHours() + ":" + hoy.getMinutes();

          document.getElementById('txtidUCRM').value = idUCRM;
          document.getElementById('txtidcli').value = idcli;
          document.getElementById('txtcli').value = nom;
          document.getElementById('txtfec').value = fecha;
          document.getElementById('txthora').value = hora;
      }

      $(document).ready(function () {
          // Cargar datos de prueba
          LClients('');
          LMethod('');
          
          // Ocultar spinner inicial
          $('#spinner-div').hide();
      });

      $('#txtbuscacli').keypress(function (event) {
          var keycode = (event.keyCode ? event.keyCode : event.which);
          if (keycode == '13') {
              LClients(document.getElementById('txtbuscacli').value);
              document.getElementById("txtbuscacli").select();
          }
      });

      // Función para búsqueda en tiempo real (opcional)
      $('#txtbuscacli').on('input', function() {
          const searchTerm = this.value;
          clearTimeout(this.searchTimeout);
          this.searchTimeout = setTimeout(() => {
              LClients(searchTerm);
          }, 300);
      });
  </script>
  <script>

    jQuery('#txtfec').datepicker();


    function GetStatus(idUCRM, nom, idcli, tipo) {

      document.getElementById('statusClientID').innerHTML = nom;

      if (tipo == '2') {

        GetStatusFiber(idUCRM, idcli);

      } else {


        GetStatusStatic(idUCRM, idcli);

      }

    }


    function Save() {



      $.confirm({
        title: 'Registrar',
        content: '¿Esta Seguro de Registrar el PAGO?',
        buttons: {
          confirm: {
            text: 'Registrar',
            btnClass: 'btn-success',
            action: function () {


              SavePay(document.getElementById('txtidUCRM').value, document.getElementById('txtidcli').value, document.getElementById('Select_Method').value, document.getElementById('txtfec').value, document.getElementById('txthora').value, document.getElementById('txtaut').value, document.getElementById('txtmonto').value, document.getElementById('txtnotas').value, document.getElementById('txtcli').value);


            }
          },
          cancel: {
            text: 'Cancelar',
            btnClass: 'btn-danger',
            action: function () {


            },
          }

        }
      });







    }


    function GetData(idUCRM, nom, idcli) {



      var hoy = new Date();

      var m = hoy.getMonth() + 1;
      var mes = (m < 10) ? '0' + m : m;

      var hh = hoy.getDate();
      var hho = (hh < 10) ? '0' + hh : hh;


      var fecha = hho + "/" + mes + "/" + hoy.getFullYear();
      var hora = hoy.getHours() + ":" + hoy.getMinutes();

      document.getElementById('txtidUCRM').value = idUCRM;
      document.getElementById('txtidcli').value = idcli;
      document.getElementById('txtcli').value = nom;
      document.getElementById('txtfec').value = fecha;
      document.getElementById('txthora').value = hora;

    }

    $(document).ready(function () {

      LClients('');
      LMethod('');

    });


    $('#txtbuscacli').keypress(function (event) {
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if (keycode == '13') {

        LClients(document.getElementById('txtbuscacli').value);


        document.getElementById("txtbuscacli").select();




      }
    });



  </script>

</body>

</html>