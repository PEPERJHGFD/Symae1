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
                          <input type="text" id="txtNombre" name="txtNombre" class="form-control" 
                                 placeholder="Nombre" required>
                        </div>

                        <div class="mb-3">
                          <input type="text" id="txtApellido" name="txtApellido" class="form-control" 
                                 placeholder="Apellido" required>
                        </div>

                        <div class="mb-3">
                          <h6 class="mb-3 text-primary mt-4">ID Cliente</h6>
                          <input type="text" id="txtID" name="txtID" class="form-control" 
                                 placeholder="ID de Cliente" value="3813">
                        </div>

                        <h6 class="mb-3 text-primary mt-4">Contacto</h6>

                        <div class="mb-3">
                          
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
                          <input type="tel" id="txtTelefono" name="txtTelefono" class="form-control" 
                                 placeholder="Teléfono" required>
                        </div>

                        <!-- Fecha de registro editable -->
                        <div class="mb-3">
                          <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="fecha-registro-container">
                              <small class="text-muted d-flex align-items-center">
                                <i data-acorn-icon="calendar" class="me-1" style="font-size: 14px;"></i>
                                <span>Fecha de registro: </span>
                                <input type="date" id="fechaRegistro" name="fechaRegistro" class="form-control form-control-sm d-inline-block ms-1" style="width: auto; display: inline-block;">
                              </small>
                            </div>
                          </div>
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
                          <textarea id="txtDireccion" name="txtDireccion" class="form-control" rows="3" 
                                    placeholder="Dirección completa" required></textarea>
                        </div>

                        <div class="row">
                          <div class="col-md-4 mb-3">
                            <input type="text" id="txtCalle" name="txtCalle" class="form-control" 
                                   placeholder="Calle">
                          </div>
                          <div class="col-md-4 mb-3">
                            <input type="text" id="txtCiudad" name="txtCiudad" class="form-control" 
                                   placeholder="Ciudad">
                          </div>
                          <div class="col-md-4 mb-3">
                            <input type="text" id="txtCodigoPostal" name="txtCodigoPostal" class="form-control" 
                                   placeholder="Código postal">
                          </div>
                        </div>

                        <div class="mb-3">
                          <input type="text" id="txtCalle2" name="txtCalle2" class="form-control" 
                                 placeholder="Calle 2">
                        </div>

                        <div class="mb-3">
                          <select id="selectNacionalidad" name="selectNacionalidad" class="form-control">
                            <option value="MX" selected>MX Mexico</option>
                            <option value="US">USA</option>
                          </select>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <input type="text" id="txtLatitud" name="txtLatitud" class="form-control" 
                                   placeholder="Latitud de GPS">
                          </div>
                          <div class="col-md-6 mb-3">
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
    <!-- Incluir el manejador de clientes -->
<script src="../js/mock-data.js"></script>
<script src="../js/client-handler.js"></script>

  <script>
  // Configurar el formulario para guardar
  document.addEventListener('DOMContentLoaded', function() {
      const form = document.querySelector('form');
      if (form) {
          form.addEventListener('submit', function(event) {
              event.preventDefault();
              handleNewClientSubmit(event);
          });
      }
  });
  </script>

  <style>
    .fecha-registro-container {
      background-color: #f8f9fa;
      padding: 6px 12px;
      border-radius: 15px;
      border: 1px solid #e9ecef;
      font-size: 0.85rem;
    }
    
    @media (max-width: 768px) {
      .fecha-registro-container {
        margin-top: 8px;
        width: 100%;
        text-align: center;
      }
    }
  </style>

  <script>
    let map, marker;

    // Obtener fecha actual formateada para el input type="date"
    function obtenerFechaActual() {
      const ahora = new Date();
      const year = ahora.getFullYear();
      const month = String(ahora.getMonth() + 1).padStart(2, '0');
      const day = String(ahora.getDate()).padStart(2, '0');
      return `${year}-${month}-${day}`;
    }

    // Establecer fecha de registro automáticamente
    function establecerFechaRegistro() {
      const fechaElement = document.getElementById('fechaRegistro');
      if (fechaElement) {
        fechaElement.value = obtenerFechaActual();
      }
    }

    // Inicializar mapa de Google
    function initMap() {
      // Coordenadas por defecto (Ciudad de Tulancingo)
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
      // Establecer la fecha de registro al cargar la página
      establecerFechaRegistro();

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

// Función mejorada para guardar cliente
function saveClient() {
    // 1. Validar campos básicos
    if (!validateForm()) {
        return;
    }

    // 2. Mostrar spinner
    $('#spinner-div').show();

    // 3. Preparar datos del formulario
    const formData = prepareFormData();

    // 4. Enviar al servidor
    $.ajax({
        url: 'save_client.php',
        method: 'POST',
        data: formData,
        dataType: 'json',
        timeout: 30000, // 30 segundos timeout
        success: function(response) {
            $('#spinner-div').hide();
            
            if (response.success) {
                // Mostrar mensaje de éxito
                showSuccessMessage(response.message, response.clientId);
                
                // Redirigir usando la URL proporcionada o construir una
                if (response.redirect_url) {
                    window.location.href = response.redirect_url;
                } else {
                    redirectToClientProfile(response.clientId, formData);
                }
                
            } else {
                showErrorMessage(response.message || 'Error desconocido');
            }
        },
        error: function(xhr, status, error) {
            $('#spinner-div').hide();
            
            let errorMessage = 'Error de conexión. Intenta nuevamente.';
            
            if (status === 'timeout') {
                errorMessage = 'Tiempo de espera agotado. Intenta nuevamente.';
            } else if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            
            showErrorMessage(errorMessage);
        }
    });
}

// Función para preparar datos del formulario
function prepareFormData() {
    return {
        txtNombre: $('#txtNombre').val().trim(),
        txtApellido: $('#txtApellido').val().trim(),
        txtEmail: $('#txtEmail').val().trim(),
        txtTelefono: $('#txtTelefono').val().trim(),
        txtDireccion: $('#txtDireccion').val().trim(),
        txtCalle: $('#txtCalle').val().trim(),
        txtCalle2: $('#txtCalle2').val().trim(),
        txtCiudad: $('#txtCiudad').val().trim(),
        txtCodigoPostal: $('#txtCodigoPostal').val().trim(),
        txtLatitud: $('#txtLatitud').val().trim(),
        txtLongitud: $('#txtLongitud').val().trim(),
        txtID: $('#txtID').val().trim(),
        selectNacionalidad: $('#selectNacionalidad').val(),
        checkUsarCorreo: $('#checkUsarCorreo').is(':checked') ? 1 : 0,
        fechaRegistro: $('#fechaRegistro').val()
    };
}

// Función mejorada de validación
function validateForm() {
    let isValid = true;
    let errors = [];

    // Limpiar errores previos
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();

    // Validar campos requeridos
    const requiredFields = [
        { id: 'txtNombre', name: 'Nombre' },
        { id: 'txtApellido', name: 'Apellido' },
        { id: 'txtTelefono', name: 'Teléfono' },
        { id: 'txtDireccion', name: 'Dirección' }
    ];

    requiredFields.forEach(field => {
        const $field = $('#' + field.id);
        if (!$field.val().trim()) {
            errors.push(field.name + ' es requerido');
            $field.addClass('is-invalid');
            $field.after('<div class="invalid-feedback">' + field.name + ' es requerido</div>');
            isValid = false;
        }
    });

    // Validar email si está presente
    const email = $('#txtEmail').val().trim();
    if (email && !isValidEmail(email)) {
        errors.push('Email debe tener un formato válido');
        $('#txtEmail').addClass('is-invalid');
        $('#txtEmail').after('<div class="invalid-feedback">Email debe tener un formato válido</div>');
        isValid = false;
    }

    // Validar teléfono
    const telefono = $('#txtTelefono').val().trim();
    if (telefono && !isValidPhone(telefono)) {
        errors.push('Teléfono debe tener un formato válido');
        $('#txtTelefono').addClass('is-invalid');
        $('#txtTelefono').after('<div class="invalid-feedback">Teléfono debe tener un formato válido</div>');
        isValid = false;
    }

    // Mostrar errores si los hay
    if (!isValid) {
        showErrorMessage('Por favor corrija los siguientes errores:<br>• ' + errors.join('<br>• '));
    }

    return isValid;
}

// Función para validar email
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Función para validar teléfono
function isValidPhone(phone) {
    const phoneRegex = /^[\d\s\-\(\)\+]+$/;
    return phoneRegex.test(phone) && phone.length >= 7;
}

// Función para mostrar mensaje de éxito
function showSuccessMessage(message, clientId) {
    if (typeof $.alert === 'function') {
        $.alert({
            title: '¡Éxito!',
            content: message + (clientId ? '<br>ID del cliente: ' + clientId : ''),
            type: 'green',
            buttons: {
                ok: {
                    text: 'OK',
                    btnClass: 'btn-success'
                }
            }
        });
    } else {
        alert(message + (clientId ? '\nID del cliente: ' + clientId : ''));
    }
}

// Función para mostrar mensaje de error
function showErrorMessage(message) {
    if (typeof $.alert === 'function') {
        $.alert({
            title: 'Error',
            content: message,
            type: 'red',
            buttons: {
                ok: {
                    text: 'OK',
                    btnClass: 'btn-danger'
                }
            }
        });
    } else {
        alert('Error: ' + message);
    }
}

// Función de redirección de respaldo
function redirectToClientProfile(clientId, formData) {
    const params = new URLSearchParams();
    
    // Agregar datos del formulario
    Object.keys(formData).forEach(key => {
        if (formData[key]) {
            params.append(key, formData[key]);
        }
    });
    
    // Agregar parámetros adicionales
    params.append('clientId', clientId);
    params.append('success', '1');
    
    // Redirigir
    window.location.href = `client.php?${params.toString()}`;
}

// Remover estilos de error cuando el usuario empiece a escribir
$(document).ready(function() {
    $('#txtNombre, #txtApellido, #txtTelefono, #txtDireccion, #txtEmail').on('input', function() {
        $(this).removeClass('is-invalid');
        $(this).next('.invalid-feedback').remove();
    });
});

// Función para resetear el formulario
function resetForm() {
    $('#formAddClient')[0].reset();
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    
    // Restablecer mapa a posición por defecto
    if (map && marker) {
        const defaultLocation = { lat: 20.0832, lng: -98.3689 };
        map.setCenter(defaultLocation);
        marker.setPosition(defaultLocation);
        $('#txtLatitud').val('');
        $('#txtLongitud').val('');
    }
    
    // Restablecer fecha
    establecerFechaRegistro();
}
  </script>
</body>
</html>