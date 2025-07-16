<?php include("seguro.php"); ?>

<!DOCTYPE html>
<html lang="en" data-footer="true" data-scrollspy="true">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Telemas | Editar Cliente</title>
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
                  <h1 class="mb-0 pb-0 display-4" id="title">  <span style="color:rgb(1, 7, 8);">Editar cliente</span></h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">CRM</a></li>
                      <li class="breadcrumb-item"><a href="Customers.php">Clientes</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Editar Cliente</li>
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

                        <!-- Campo de nota desplegable -->
                        <div class="mb-3">
                          <a href="#" id="linkAddNote" class="text-primary" style="text-decoration: none;">
                            <i data-acorn-icon="plus" class="me-1"></i>
                            Añadir etiqueta, nota
                          </a>
                          
                          <!-- Campo de nota que se mostrará/ocultará -->
                          <div id="noteSection" style="display: none;" class="mt-3">
                            <label class="form-label">Nota/Comentario</label>
                            <textarea id="txtNota" name="txtNota" class="form-control" rows="3" 
                                      placeholder="Escriba aquí su nota o comentario..."></textarea>
                            <div class="mt-2">
                              <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeNote()">
                                <i data-acorn-icon="trash-2" class="me-1"></i>
                                Eliminar nota
                              </button>
                            </div>
                          </div>
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

                        <!-- Más detalles con fecha de registro -->
                        <div class="mb-3">
                          <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="fecha-registro-container">
                              <small class="text-muted d-flex align-items-center">
                                <i data-acorn-icon="calendar" class="me-1" style="font-size: 14px;"></i>
                                <span>Fecha de registro: </span>
                                <strong id="fechaRegistro" class="ms-1 text-primary">--</strong>
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
    

    // Obtener fecha actual formateada
    function obtenerFechaActual() {
      const ahora = new Date();
      const opciones = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        timeZone: 'America/Mexico_City'
      };
      return ahora.toLocaleDateString('es-MX', opciones);
    }

    // Establecer fecha de registro automáticamente
    function establecerFechaRegistro() {
      const fechaElement = document.getElementById('fechaRegistro');
      if (fechaElement) {
        fechaElement.textContent = obtenerFechaActual();
      }
    }
    // Función para guardar/actualizar cliente
function saveClient() {
  // Primero validar que los campos requeridos estén llenos
  if (!validateForm()) {
    return;
  }

  // Mostrar confirmación antes de guardar
  $.confirm({
    title: '¿Guardar cambios?',
    content: '¿Está seguro de que desea guardar los cambios realizados en este cliente?',
    type: 'blue',
    typeAnimated: true,
    buttons: {
      confirmar: {
        text: 'Sí, guardar',
        btnClass: 'btn-blue',
        action: function() {
          // Proceder con el guardado
          performSaveClient();
        }
      },
      cancelar: {
        text: 'Cancelar',
        btnClass: 'btn-outline-secondary',
        action: function() {
          // Redirigir a Customers.php cuando cancele
          window.location.href = 'Customers.php';
        }
      }
    }
  });
}

// Función para validar el formulario
function validateForm() {
  let isValid = true;
  
  // Validar campos requeridos
  const requiredFields = [
    { id: 'txtNombre', name: 'Nombre' },
    { id: 'txtApellido', name: 'Apellido' },
    { id: 'txtTelefono', name: 'Teléfono' },
    { id: 'txtDireccion', name: 'Dirección' }
  ];

  requiredFields.forEach(field => {
    const element = $(`#${field.id}`);
    if (!element.val().trim()) {
      element.addClass('is-invalid');
      isValid = false;
    } else {
      element.removeClass('is-invalid');
    }
  });

  // Validar email si está presente
  const email = $('#txtEmail').val().trim();
  if (email && !isValidEmail(email)) {
    $('#txtEmail').addClass('is-invalid');
    isValid = false;
  } else {
    $('#txtEmail').removeClass('is-invalid');
  }

  if (!isValid) {
    $.alert({
      title: 'Campos requeridos',
      content: 'Por favor complete todos los campos marcados como requeridos.',
      type: 'red'
    });
  }

  return isValid;
}

// Función para validar email
function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

// Función que ejecuta el guardado real
// Función que ejecuta el guardado SIMULADO (sin base de datos)
function performSaveClient() {
  // Mostrar spinner
  $('#spinner-div').show();
  
  // Recopilar todos los datos del formulario
  const clientData = {
    id: $('#txtID').val(),
    nombre: $('#txtNombre').val().trim(),
    apellido: $('#txtApellido').val().trim(),
    email: $('#txtEmail').val().trim(),
    telefono: $('#txtTelefono').val().trim(),
    direccion: $('#txtDireccion').val().trim(),
    calle: $('#txtCalle').val().trim(),
    ciudad: $('#txtCiudad').val().trim(),
    codigoPostal: $('#txtCodigoPostal').val().trim(),
    calle2: $('#txtCalle2').val().trim(),
    nacionalidad: $('#selectNacionalidad').val(),
    latitud: $('#txtLatitud').val().trim(),
    longitud: $('#txtLongitud').val().trim(),
    nota: $('#txtNota').val().trim(),
    usarCorreo: $('#checkUsarCorreo').is(':checked') ? 1 : 0,
    fechaRegistro: $('#fechaRegistro').text()
  };

  // SIMULACIÓN: En lugar de AJAX real, simulamos el proceso
  // Simular tiempo de procesamiento (1.5 segundos)
  setTimeout(function() {
    // Ocultar spinner
    $('#spinner-div').hide();
    
    // Simular una respuesta exitosa
    const simulatedResponse = {
      success: true,
      message: 'Cliente actualizado correctamente',
      clientId: clientData.id,
      timestamp: new Date().toISOString()
    };
    
    // Opcional: Mostrar en consola los datos que se "guardarían"
    console.log('=== DATOS QUE SE GUARDARÍAN ===');
    console.log(JSON.stringify(clientData, null, 2));
    console.log('=== FIN DE DATOS ===');
    
    // Procesar respuesta simulada
    if (simulatedResponse.success) {
      // Éxito - mostrar mensaje y redirigir
      $.alert({
        title: 'Cliente actualizado',
        content: 'Los datos del cliente se han actualizado correctamente.',
        type: 'green',
        buttons: {
          verCliente: {
            text: 'Ver cliente',
            btnClass: 'btn-green',
            action: function() {
              // Redirigir a client.php con los datos actualizados
              redirectToClientProfile(clientData);
            }
          },
          verLista: {
            text: 'Ver lista de clientes',
            btnClass: 'btn-outline-primary',
            action: function() {
              // Redirigir a la lista de clientes
              window.location.href = 'Customers.php';
            }
          }
        }
      });
    } else {
      // En caso de error simulado (puedes modificar esto para probar errores)
      $.alert({
        title: 'Error',
        content: simulatedResponse.message || 'Ocurrió un error al actualizar el cliente.',
        type: 'red'
      });
    }
    
  }, 1500); // Simular 1.5 segundos de procesamiento
}

// Función alternativa para simular diferentes tipos de respuesta
function performSaveClientWithErrorSimulation() {
  // Mostrar spinner
  $('#spinner-div').show();
  
  // Recopilar datos del formulario
  const clientData = {
    id: $('#txtID').val(),
    nombre: $('#txtNombre').val().trim(),
    apellido: $('#txtApellido').val().trim(),
    email: $('#txtEmail').val().trim(),
    telefono: $('#txtTelefono').val().trim(),
    direccion: $('#txtDireccion').val().trim(),
    // ... resto de campos
  };

  // Simular tiempo de procesamiento
  setTimeout(function() {
    $('#spinner-div').hide();
    
    // Simular diferentes tipos de respuesta aleatoriamente
    const responseTypes = [
      { success: true, message: 'Cliente actualizado correctamente' },
      { success: false, message: 'Error: El email ya existe en el sistema' },
      { success: false, message: 'Error: No se pudo conectar con el servidor' },
      { success: true, message: 'Cliente creado exitosamente' }
    ];
    
    // Elegir respuesta aleatoria (90% éxito, 10% error)
    const randomResponse = Math.random() < 0.9 ? responseTypes[0] : responseTypes[1];
    
    console.log('Respuesta simulada:', randomResponse);
    console.log('Datos del cliente:', clientData);
    
    if (randomResponse.success) {
      $.alert({
        title: 'Operación exitosa',
        content: randomResponse.message,
        type: 'green',
        buttons: {
          continuar: {
            text: 'Continuar',
            btnClass: 'btn-green',
            action: function() {
              redirectToClientProfile(clientData);
            }
          }
        }
      });
    } else {
      $.alert({
        title: 'Error',
        content: randomResponse.message,
        type: 'red'
      });
    }
    
  }, Math.random() * 2000 + 1000); // Tiempo aleatorio entre 1-3 segundos
}

// Función para eliminar nota
function removeNote() {
  $('#noteSection').slideUp(300, function() {
    $('#txtNota').val('');
    $('#linkAddNote').html('<i data-acorn-icon="plus" class="me-1"></i>Añadir etiqueta, nota');
  });
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

  // NUEVO: Cargar datos del cliente desde URL parameters
  loadClientDataFromURL();

  // Inicializar Select2
  $('#selectNacionalidad').select2({
    placeholder: 'Seleccione nacionalidad'
  });

  // Evento para mostrar/ocultar el campo de nota
  $('#linkAddNote').click(function(e) {
    e.preventDefault();
    $('#noteSection').slideToggle(300);
    
    // Cambiar el texto del enlace
    if ($('#noteSection').is(':visible')) {
      $(this).html('<i data-acorn-icon="minus" class="me-1"></i>Ocultar nota');
    } else {
      $(this).html('<i data-acorn-icon="plus" class="me-1"></i>Añadir etiqueta, nota');
    }
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
    // Función para cargar datos del cliente desde URL parameters
function loadClientDataFromURL() {
  try {
    const urlParams = new URLSearchParams(window.location.search);
    
    // Verificar si hay parámetros de cliente
    if (urlParams.has('nombre') || urlParams.has('clientId')) {
      
      // Cargar datos básicos
      if (urlParams.get('nombre')) {
        $('#txtNombre').val(decodeURIComponent(urlParams.get('nombre')));
      }
      
      if (urlParams.get('apellido')) {
        $('#txtApellido').val(decodeURIComponent(urlParams.get('apellido')));
      }
      
      if (urlParams.get('email')) {
        $('#txtEmail').val(decodeURIComponent(urlParams.get('email')));
      }
      
      if (urlParams.get('telefono')) {
        $('#txtTelefono').val(decodeURIComponent(urlParams.get('telefono')));
      }
      
      if (urlParams.get('direccion')) {
        $('#txtDireccion').val(decodeURIComponent(urlParams.get('direccion')));
      }
      
      if (urlParams.get('clientId')) {
        $('#txtID').val(decodeURIComponent(urlParams.get('clientId')));
      }
      
      // Cargar nota si existe
      if (urlParams.get('nota') && urlParams.get('nota') !== 'Sin notas') {
        $('#txtNota').val(decodeURIComponent(urlParams.get('nota')));
        // Mostrar la sección de notas
        $('#noteSection').show();
        $('#linkAddNote').html('<i data-acorn-icon="minus" class="me-1"></i>Ocultar nota');
      }
      
      // Cargar coordenadas GPS
      if (urlParams.get('latitud')) {
        $('#txtLatitud').val(decodeURIComponent(urlParams.get('latitud')));
      }
      
      if (urlParams.get('longitud')) {
        $('#txtLongitud').val(decodeURIComponent(urlParams.get('longitud')));
      }
      
      // Actualizar el título de la página
      const nombre = urlParams.get('nombre') || '';
      const apellido = urlParams.get('apellido') || '';
      if (nombre || apellido) {
        const fullName = `${decodeURIComponent(nombre)} ${decodeURIComponent(apellido)}`.trim();
        document.title = `Telemas | Editar ${fullName}`;
        $('#title').html(`<span style="color:rgb(1, 7, 8);">Editar cliente:</span> <span class="text-primary">${fullName}</span>`);
      }
      
      // Actualizar mapa si hay coordenadas
      setTimeout(() => {
        updateMapWithCoordinates();
      }, 1000); // Esperar a que el mapa se cargue
      
      console.log('Datos del cliente cargados para edición');
      
    } else {
      console.log('No se encontraron parámetros de cliente - modo creación');
    }
    
  } catch (error) {
    console.error('Error cargando datos del cliente:', error);
  }
}

// Función para actualizar el mapa con las coordenadas cargadas
function updateMapWithCoordinates() {
  const lat = parseFloat($('#txtLatitud').val());
  const lng = parseFloat($('#txtLongitud').val());
  
  if (lat && lng && map && marker) {
    const newPosition = { lat: lat, lng: lng };
    map.setCenter(newPosition);
    marker.setPosition(newPosition);
    console.log('Mapa actualizado con coordenadas:', newPosition);
  }
}

// Función mejorada para redirigir al perfil después de guardar
function redirectToClientProfile(clientData) {
  // Construir URL con parámetros para el perfil del cliente
  const params = new URLSearchParams();
  
  // Agregar todos los datos como parámetros
  Object.keys(clientData).forEach(key => {
    if (clientData[key]) {
      params.append(key, clientData[key]);
    }
  });

  // Agregar parámetro de éxito para mostrar mensaje
  params.append('success', '1');
  params.append('action', 'updated');

  // Redirigir a la página de perfil del cliente
  window.location.href = `client.php?${params.toString()}`;
}

    // Remover estilos de error cuando el usuario empiece a escribir
    $('#txtNombre, #txtApellido, #txtTelefono, #txtDireccion').on('input', function() {
      $(this).removeClass('is-invalid');
    });
  </script>
</body>
</html>