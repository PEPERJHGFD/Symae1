<?php include("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Telemas | Agregar Cliente</title>
  <meta name="description" content="Agregar nuevo cliente a Telemas" />

  <?php include("header.php"); ?>
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
                  <h1 class="mb-0 pb-0 display-4" id="title">  <span style="color:rgb(1, 7, 8);">Añadir cliente</span></h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">CRM</a></li>
                      <li class="breadcrumb-item"><a href="Customers.php">Clientes</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Agregar Cliente</li>
                    </ul>
                  </nav>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                  <button type="button" class="btn btn-outline-secondary btn-icon btn-icon-start me-2" onclick="window.location.href='Customers.php'">
                    <i data-acorn-icon="arrow-left"></i>
                    <span>CANCELAR</span>
                  </button>
                  <button type="button" class="btn btn-secondary btn-icon btn-icon-start me-2" onclick="saveClient()">
                    <i data-acorn-icon="save"></i>
                    <span>GUARDAR</span>
                  </button>
                </div>
                <!-- Top Buttons End -->
              </div>
            </div>
            <!-- Title and Top Buttons End -->

            <!-- Content Start -->
            <div>
              <form id="formAddClient">
                <div class="row">
                  <!-- Columna General -->
                  <div class="col-md-6">
                    <div class="card mb-5">
                      <div class="card-body">
                        <h5 class="mb-3 text-primary">
                          <i data-acorn-icon="user" class="me-2"></i>
                          General
                        </h5>

                        <div class="mb-3">
                          <label class="form-label">Nombre</label>
                          <input type="text" id="txtNombre" name="txtNombre" class="form-control" 
                                 placeholder="Nombre" required>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Apellido</label>
                          <input type="text" id="txtApellido" name="txtApellido" class="form-control" 
                                 placeholder="Apellido" required>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="form-check mb-3">
          
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-check mb-3">
                            
                            </div>
                          </div>
                        </div>

                       
                        <div class="mb-3">
                          <a href="#" class="text-primary" style="text-decoration: none;">Añadir etiqueta, nota</a>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">ID de Cliente</label>
                          <input type="text" id="txtID" name="txtID" class="form-control" 
                                 placeholder="3813" value="3813">
                        </div>

                        <h6 class="mb-3 text-primary mt-4">Contacto</h6>

                        <div class="mb-3">
                          <label class="form-label">Correo electrónico</label>
                          <input type="email" id="txtEmail" name="txtEmail" class="form-control" 
                                 placeholder="Correo electrónico">
                        </div>

                        <div class="form-check mb-3">
                          <input class="form-check-input" type="checkbox" id="checkUsarCorreo" name="checkUsarCorreo" checked>
                          <label class="form-check-label" for="checkUsarCorreo">
                            Usar correo de nombre de usuario <i data-acorn-icon="help-circle" class="text-muted" style="font-size: 14px;"></i>
                          </label>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Teléfono</label>
                          <input type="tel" id="txtTelefono" name="txtTelefono" class="form-control" 
                                 placeholder="Teléfono" required>
                        </div>

                        <div class="mb-3">
                          <a href="#" class="text-primary" style="text-decoration: none;">Más detalles...</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Columna Ubicación -->
                  <div class="col-md-6">
                    <div class="card mb-5">
                      <div class="card-body">
                        <h5 class="mb-3 text-primary">
                          <i data-acorn-icon="map-pin" class="me-2"></i>
                          Ubicación
                        </h5>

                        <div class="mb-3">
                          <label class="form-label">Dirección completa</label>
                          <textarea id="txtDireccion" name="txtDireccion" class="form-control" rows="3" 
                                    placeholder="Dirección completa" required></textarea>
                        </div>

                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <label class="form-label">Calle</label>
                            <input type="text" id="txtCalle" name="txtCalle" class="form-control" 
                                   placeholder="Calle">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label class="form-label">Ciudad</label>
                            <input type="text" id="txtCiudad" name="txtCiudad" class="form-control" 
                                   placeholder="Ciudad">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label class="form-label">Código postal</label>
                            <input type="text" id="txtCodigoPostal" name="txtCodigoPostal" class="form-control" 
                                   placeholder="Código postal">
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Calle 2</label>
                          <input type="text" id="txtCalle2" name="txtCalle2" class="form-control" 
                                 placeholder="Calle 2">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Nacionalidad</label>
                          <select id="selectNacionalidad" name="selectNacionalidad" class="form-control">
                            <option value="MX" selected>MX Mexico</option>
                            <option value="US">USA</option>
                          </select>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label class="form-label">Latitud de GPS</label>
                            <input type="text" id="txtLatitud" name="txtLatitud" class="form-control" 
                                   placeholder="Latitud de GPS">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label">Longitud de GPS</label>
                            <input type="text" id="txtLongitud" name="txtLongitud" class="form-control" 
                                   placeholder="Longitud de GPS">
                          </div>
                        </div>

                        <!-- Mapa de Google -->
                        <div id="map" style="height: 300px; width: 100%; border-radius: 8px;"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- Content End -->
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Scripts -->
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

  <script src="js/base/helpers.js"></script>
  <script src="js/base/globals.js"></script>
  <script src="js/base/nav.js"></script>
  <script src="js/base/search.js"></script>
  <script src="js/base/settings.js"></script>

  <script src="js/common.js"></script>
  <script src="js/scripts.js"></script>
  <script src="../js/controls.select2.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

  <!-- Google Maps API -->
  <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5VV4z8tv-6N9nHtl99iwlfjFUEVY-8-I&callback=initMap&v=weekly"
      defer
    ></script>

  <script>
    let map, marker;

    // Inicializar mapa de Google
    function initMap() {
      // Coordenadas por defecto (Ciudad de México)
      const defaultLocation = { lat: 20.0832, lng: -98.3689 };
      
      map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: defaultLocation,
      });

      // Crear marcador
      marker = new google.maps.Marker({
        position: defaultLocation,
        map: map,
        draggable: true,
        title: "Ubicación del cliente"
      });

      // Evento cuando se arrastra el marcador
      marker.addListener('dragend', function() {
        const position = marker.getPosition();
        $('#txtLatitud').val(position.lat());
        $('#txtLongitud').val(position.lng());
        
        // Obtener dirección por geocodificación inversa
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: position }, (results, status) => {
          if (status === "OK" && results[0]) {
            $('#txtDireccion').val(results[0].formatted_address);
          }
        });
      });

      // Clic en el mapa para mover marcador
      map.addListener('click', function(event) {
        marker.setPosition(event.latLng);
        $('#txtLatitud').val(event.latLng.lat());
        $('#txtLongitud').val(event.latLng.lng());
        
        // Obtener dirección por geocodificación inversa
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: event.latLng }, (results, status) => {
          if (status === "OK" && results[0]) {
            $('#txtDireccion').val(results[0].formatted_address);
          }
        });
      });

      // Autocompletar direcciones
      const autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('txtDireccion'),
        { types: ['address'] }
      );

      autocomplete.addListener('place_changed', function() {
        const place = autocomplete.getPlace();
        if (place.geometry) {
          map.setCenter(place.geometry.location);
          marker.setPosition(place.geometry.location);
          $('#txtLatitud').val(place.geometry.location.lat());
          $('#txtLongitud').val(place.geometry.location.lng());
        }
      });
    }

    $(document).ready(function() {
      // Inicializar Select2
      $('#selectNacionalidad').select2({
        placeholder: 'Seleccione nacionalidad'
      });

      // Cuando se cambien las coordenadas manualmente, actualizar mapa
      $('#txtLatitud, #txtLongitud').on('change', function() {
        const lat = parseFloat($('#txtLatitud').val());
        const lng = parseFloat($('#txtLongitud').val());
        
        if (lat && lng && map && marker) {
          const newPosition = { lat: lat, lng: lng };
          map.setCenter(newPosition);
          marker.setPosition(newPosition);
        }
      });
    });

    function saveClient() {
      if (!validateForm()) {
        return;
      }

      $.confirm({
        title: 'Guardar Cliente',
        content: '¿Está seguro de guardar este cliente?',
        buttons: {
          confirm: {
            text: 'Guardar',
            btnClass: 'btn-success',
            action: function() {
              $.alert({
                title: 'Éxito',
                content: 'Cliente guardado exitosamente',
                type: 'green',
                buttons: {
                  ok: function() {
                    $('#formAddClient')[0].reset();
                    $('#selectNacionalidad').val('').trigger('change');
                  }
                }
              });
            }
          },
          cancel: {
            text: 'Cancelar',
            btnClass: 'btn-secondary'
          }
        }
      });
    }

    function saveAndSendClient() {
      if (!validateForm()) {
        return;
      }

      $.confirm({
        title: 'Enviar y Guardar Cliente',
        content: '¿Está seguro de enviar y guardar este cliente?',
        buttons: {
          confirm: {
            text: 'Enviar y Guardar',
            btnClass: 'btn-primary',
            action: function() {
              $.alert({
                title: 'Éxito',
                content: 'Cliente enviado y guardado exitosamente',
                type: 'green',
                buttons: {
                  ok: function() {
                    $('#formAddClient')[0].reset();
                    $('#selectNacionalidad').val('').trigger('change');
                  }
                }
              });
            }
          },
          cancel: {
            text: 'Cancelar',
            btnClass: 'btn-secondary'
          }
        }
      });
    }

    function validateForm() {
      let isValid = true;
      let errors = [];

      $('.is-invalid').removeClass('is-invalid');

      if (!$('#txtNombre').val().trim()) {
        errors.push('El nombre es requerido');
        $('#txtNombre').addClass('is-invalid');
        isValid = false;
      }

      if (!$('#txtTelefono').val().trim()) {
        errors.push('El teléfono es requerido');
        $('#txtTelefono').addClass('is-invalid');
        isValid = false;
      }

      if (!$('#txtDireccion').val().trim()) {
        errors.push('La dirección es requerida');
        $('#txtDireccion').addClass('is-invalid');
        isValid = false;
      }

      if (!isValid) {
        $.alert({
          title: 'Campos Requeridos',
          content: 'Por favor complete los siguientes campos:\n• ' + errors.join('\n• '),
          type: 'red'
        });
      }

      return isValid;
    }

    $('#txtNombre, #txtTelefono, #txtDireccion').on('input', function() {
      $(this).removeClass('is-invalid');
    });
  </script>
</body>
</html>