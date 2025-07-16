<?php include("seguro.php"); ?>

<!DOCTYPE html>
<html lang="es" data-footer="true" data-scrollspy="true">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Telemas | Perfil Cliente</title>
  <meta name="description" content="Perfil del cliente en Telemas" />

  <?php include("header.php"); ?>
</head>

<body>
  <div id="root">
    <?php include("navbar.php"); ?>

    <main>
      <!-- Spinner -->
      <div id="spinner-div" style="display: none;">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <!-- Title and Top Buttons Start -->
            <div class="page-title-container mb-4">
              <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                  <div class="d-flex align-items-center mb-2">
                    <h1 class="mb-0 pb-0 display-4 me-3">
                      <span style="color:rgb(1, 7, 8);">Cliente</span> / 
                      <span class="text-primary" id="clientName">Marco Antonio Martínez</span>
                    </h1>
                    <!-- Botón junto al nombre -->
                    <div class="dropdown">
                      <button class="btn btn-primary btn-icon btn-icon-start dropdown-toggle" type="button" 
                              data-bs-toggle="dropdown" aria-expanded="false">
                        <i data-acorn-icon="plus"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="crearServicio()">Crear Servicio</a></li>
                        <li><a class="dropdown-item" href="#" onclick="crearFactura()">Crear Factura</a></li>
                        <li><a class="dropdown-item" href="#" onclick="crearTicket()">Crear Ticket</a></li>
                      </ul>
                    </div>
                  </div>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">CRM</a></li>
                      <li class="breadcrumb-item"><a href="Customers.php">Clientes</a></li>
                      <li class="breadcrumb-item active" aria-current="page" id="breadcrumbName">Marco Antonio Martínez</li>
                    </ul>
                  </nav>
                </div>
                <!-- Title End -->
              </div>
            </div>
            <!-- Title and Top Buttons End -->

            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs mb-4" id="clientTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="general-tab" data-bs-toggle="tab" 
                        data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">
                  Vista General
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="facturas-tab" data-bs-toggle="tab" 
                        data-bs-target="#facturas" type="button" role="tab" aria-controls="facturas" aria-selected="false">
                  Facturas
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pagos-tab" data-bs-toggle="tab" 
                        data-bs-target="#pagos" type="button" role="tab" aria-controls="pagos" aria-selected="false">
                  Pagos
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="documentos-tab" data-bs-toggle="tab" 
                        data-bs-target="#documentos" type="button" role="tab" aria-controls="documentos" aria-selected="false">
                  Documentos
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tickets-tab" data-bs-toggle="tab" 
                        data-bs-target="#tickets" type="button" role="tab" aria-controls="tickets" aria-selected="false">
                  Tickets
                </button>
              </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="clientTabContent">
              <!-- Vista General Tab -->
              <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                <div class="row">
                  <!-- Left Column -->
                  <div class="col-md-8">
                    <!-- Service Creation Card -->
                    <div class="card mb-4">
                      <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                          <div class="me-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 60px; height: 60px;">
                              <i data-acorn-icon="globe" class="text-white" style="font-size: 24px;"></i>
                            </div>
                          </div>
                          <div>
                            <h5 class="mb-1">Crear un Servicio para <span id="serviceClientName">Marco Antonio</span></h5>
                            <button class="btn btn-primary btn-sm" onclick="crearServicio()">
                              <i data-acorn-icon="plus" class="me-1"></i>
                              Servicio
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Activity Log -->
                    <div class="card">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">REGISTROS</h5>
                      </div>
                      <div class="card-body">
                        <!-- New Entry Input -->
                        <div class="d-flex mb-4">
                          <div class="me-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 32px; height: 32px;">
                              <i data-acorn-icon="user" class="text-white" style="font-size: 14px;"></i>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <input type="text" class="form-control" id="newEntryInput" 
                                   placeholder="Nueva entrada para el registro del cliente">
                          </div>
                          <button class="btn btn-primary ms-2" onclick="addNewEntry()">ENVIAR</button>
                        </div>

                        <!-- Activity Items -->
                        <div id="activityLog">
                          <!-- Activity items will be populated by JavaScript -->
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                          <span class="text-muted">Mostrar hasta 5</span>
                          <div>
                            <span class="me-3">1-5 de 7</span>
                            <button class="btn btn-outline-secondary btn-sm me-1">
                              <i data-acorn-icon="chevron-left"></i>
                            </button>
                            <button class="btn btn-outline-secondary btn-sm">
                              <i data-acorn-icon="chevron-right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Right Column -->
                  <div class="col-md-4">
                    <!-- Client Info Card -->
                    <div class="card mb-4">
                      <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                          <div class="me-3">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" 
                                 style="width: 60px; height: 60px; font-size: 18px;" id="clientInitials">
                              MA
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h5 class="mb-1" id="clientFullName">Marco Antonio Martínez</h5>
                            <button class="btn btn-link btn-sm p-0 text-primary" onclick="añadirEtiqueta()">
                              <i data-acorn-icon="plus" class="me-1"></i>
                              AÑADIR ETIQUETA DE CLIENTE
                            </button>
                          </div>
                          <button class="btn btn-outline-secondary btn-sm" onclick="editarCliente()">
                            <i data-acorn-icon="edit"></i>
                          </button>
                        </div>

                        <div class="row g-2 mb-3">
                          <div class="col-6">
                            <label class="form-label text-muted small">ID de Cliente</label>
                            <div class="fw-bold" id="clientId">44006</div>
                          </div>
                          <div class="col-6">
                            <label class="form-label text-muted small">Teléfono</label>
                            <div class="fw-bold small" id="clientPhone">Tel.55 2849 4127, 386 126 3048</div>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label text-muted small">Email</label>
                          <div class="fw-bold" id="clientEmail">No especificado</div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label text-muted small">Dirección</label>
                          <div class="small" id="clientAddress">
                            Referencia en la calle Adolfo López Mateos con dirección a xocopa después de las secundaria ahí una ferretería después ahí una entrada de pinos en 200 metros está mi casa
                          </div>
                          <button class="btn btn-link btn-sm p-0 text-primary mt-1" onclick="mostrarMasAddress()">
                            mostrar más
                          </button>
                        </div>

                        <div class="mb-3">
                          <label class="form-label text-muted small">Notas</label>
                          <div class="small" id="clientNotes">Sin notas</div>
                        </div>
                      </div>
                    </div>

                    <!-- Next Invoice Preview -->
                    <div class="card mb-4">
                      <div class="card-header">
                        <h6 class="mb-0">VISTA PREVIA DE LA SIGUIENTE FACTURA</h6>
                      </div>
                      <div class="card-body text-center py-5">
                        <div class="mb-3">
                          <i data-acorn-icon="file-text" class="text-muted" style="font-size: 48px;"></i>
                        </div>
                        <p class="text-muted">No hay facturas programadas</p>
                      </div>
                    </div>

                    <!-- Tasks -->
                    <div class="card">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">TAREAS</h6>
                        <div>
                          <button class="btn btn-link btn-sm text-primary p-0 me-3" onclick="añadirTarea()">
                            AÑADIR TAREA
                          </button>
                          <button class="btn btn-link btn-sm text-primary p-0" onclick="verTodasTareas()">
                            VER TODOS
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="text-center py-3">
                          <p class="text-muted mb-0">No hay tareas pendientes</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Facturas Tab -->
              <div class="tab-pane fade" id="facturas" role="tabpanel" aria-labelledby="facturas-tab">
                <div class="card">
                  <div class="card-body text-center py-5">
                    <i data-acorn-icon="file-text" class="text-muted mb-3" style="font-size: 48px;"></i>
                    <h5>No hay facturas</h5>
                    <p class="text-muted">Este cliente no tiene facturas registradas.</p>
                    <button class="btn btn-primary" onclick="crearFactura()">
                      <i data-acorn-icon="plus" class="me-1"></i>
                      Crear Factura
                    </button>
                  </div>
                </div>
              </div>

              <!-- Pagos Tab -->
              <div class="tab-pane fade" id="pagos" role="tabpanel" aria-labelledby="pagos-tab">
                <div class="card">
                  <div class="card-body text-center py-5">
                    <i data-acorn-icon="credit-card" class="text-muted mb-3" style="font-size: 48px;"></i>
                    <h5>No hay pagos</h5>
                    <p class="text-muted">Este cliente no tiene pagos registrados.</p>
                  </div>
                </div>
              </div>

              <!-- Documentos Tab -->
              <div class="tab-pane fade" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                <div class="card">
                  <div class="card-body text-center py-5">
                    <i data-acorn-icon="folder" class="text-muted mb-3" style="font-size: 48px;"></i>
                    <h5>No hay documentos</h5>
                    <p class="text-muted">Este cliente no tiene documentos registrados.</p>
                    <button class="btn btn-primary" onclick="subirDocumento()">
                      <i data-acorn-icon="upload" class="me-1"></i>
                      Subir Documento
                    </button>
                  </div>
                </div>
              </div>

              <!-- Tickets Tab -->
              <div class="tab-pane fade" id="tickets" role="tabpanel" aria-labelledby="tickets-tab">
                <div class="card">
                  <div class="card-body text-center py-5">
                    <i data-acorn-icon="help-circle" class="text-muted mb-3" style="font-size: 48px;"></i>
                    <h5>No hay tickets</h5>
                    <p class="text-muted">Este cliente no tiene tickets de soporte.</p>
                    <button class="btn btn-primary" onclick="crearTicket()">
                      <i data-acorn-icon="plus" class="me-1"></i>
                      Crear Ticket
                    </button>
                  </div>
                </div>
              </div>
            </div>
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

  <script src="js/base/helpers.js"></script>
  <script src="js/base/globals.js"></script>
  <script src="js/base/nav.js"></script>
  <script src="js/base/search.js"></script>
  <script src="js/base/settings.js"></script>

  <script src="js/common.js"></script>
  <script src="js/scripts.js"></script>

  <script>
    $(document).ready(function() {
  // Ocultar spinner inicialmente
  $('#spinner-div').hide();
  
  // Cargar datos del cliente desde URL params
  loadClientData();
  
  // Cargar actividad del cliente
  loadActivityLog();

  // Inicializar tooltips si están disponibles
  if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  }

  // Mostrar mensaje de éxito si viene de guardado
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.get('success') === '1') {
    showSuccessMessage('Cliente guardado exitosamente');
  }
});

function loadClientData() {
  try {
    const urlParams = new URLSearchParams(window.location.search);
    const clientData = {
      nombre: urlParams.get('nombre') || 'Marco Antonio',
      apellido: urlParams.get('apellido') || 'Martínez',
      email: urlParams.get('email') || '',
      telefono: urlParams.get('telefono') || 'Tel.55 2849 4127',
      direccion: urlParams.get('direccion') || 'Dirección no especificada',
      clientId: urlParams.get('clientId') || '44006',
      nota: urlParams.get('nota') || '',
      tieneServicio: urlParams.get('tieneServicio') === 'true' || false,
      latitud: urlParams.get('latitud') || null,
      longitud: urlParams.get('longitud') || null
    };
    
    // Decodificar datos que vienen en URL
    clientData.nombre = decodeURIComponent(clientData.nombre);
    clientData.apellido = decodeURIComponent(clientData.apellido);
    clientData.email = decodeURIComponent(clientData.email);
    clientData.telefono = decodeURIComponent(clientData.telefono);
    clientData.direccion = decodeURIComponent(clientData.direccion);
    clientData.nota = decodeURIComponent(clientData.nota);
    if (clientData.latitud) clientData.latitud = decodeURIComponent(clientData.latitud);
    if (clientData.longitud) clientData.longitud = decodeURIComponent(clientData.longitud);
    
    updateClientInterface(clientData);
    
    // Decidir qué mostrar según si tiene servicio
    if (clientData.tieneServicio) {
      showMapView(clientData);
    } else {
      showServiceCreationView(clientData);
    }
    
  } catch (error) {
    console.error('Error cargando datos del cliente:', error);
    // Mostrar datos por defecto en caso de error
    showDefaultClientData();
  }
}

function showDefaultClientData() {
  const defaultData = {
    nombre: 'Marco Antonio',
    apellido: 'Martínez',
    email: '',
    telefono: 'Tel.55 2849 4127',
    direccion: 'Dirección no especificada',
    clientId: '44006',
    nota: '',
    tieneServicio: false,
    latitud: null,
    longitud: null
  };
  
  updateClientInterface(defaultData);
  showServiceCreationView(defaultData);
}

function updateClientInterface(data) {
  try {
    const fullName = `${data.nombre} ${data.apellido}`;
    const initials = `${data.nombre.charAt(0)}${data.apellido.charAt(0)}`.toUpperCase();

    // Actualizar elementos de la página
    $('#clientName').text(fullName);
    $('#breadcrumbName').text(fullName);
    $('#clientFullName').text(fullName);
    $('#serviceClientName').text(data.nombre);
    $('#clientInitials').text(initials);
    $('#clientId').text(data.clientId);
    $('#clientPhone').text(data.telefono);
    $('#clientEmail').text(data.email || 'No especificado');
    $('#clientAddress').text(data.direccion);
    $('#clientNotes').text(data.nota || 'Sin notas');

    // Actualizar título de la página
    document.title = `Telemas | ${fullName}`;
    
    console.log('Datos del cliente cargados:', data);
  } catch (error) {
    console.error('Error actualizando interfaz:', error);
  }
}

function showSuccessMessage(message) {
  // Crear un toast o alert para mostrar el mensaje de éxito
  const alertHtml = `
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 1050;">
      <i data-acorn-icon="check" class="me-2"></i>
      ${message}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  `;
  
  $('body').append(alertHtml);
  
  // Auto-remover después de 5 segundos
  setTimeout(() => {
    $('.alert-success').fadeOut();
  }, 5000);
}

function loadActivityLog() {
  try {
    const urlParams = new URLSearchParams(window.location.search);
    const isNewClient = urlParams.get('success') === '1';
    
    const activities = [];
    
    // Si es un cliente nuevo, agregar actividad de creación
    if (isNewClient) {
      activities.push({
        icon: 'user-plus',
        type: 'success',
        user: 'Sistema',
        message: 'Cliente creado exitosamente',
        date: formatDate(new Date())
      });
    }
    
    // Agregar actividades por defecto
    activities.push({
      icon: 'mail',
      type: 'info',
      message: 'Perfil del cliente inicializado',
      date: formatDate(new Date(Date.now() - 300000)) // 5 minutos atrás
    });

    const logContainer = $('#activityLog');
    logContainer.empty();

    activities.forEach(activity => {
      const iconColor = activity.type === 'success' ? 'text-success' : 
                       activity.type === 'danger' ? 'text-danger' : 'text-muted';
      
      const activityHtml = `
        <div class="d-flex mb-3">
          <div class="me-3">
            <i data-acorn-icon="${activity.icon}" class="${iconColor}"></i>
          </div>
          <div class="flex-grow-1">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                ${activity.user ? `<strong>${activity.user}</strong><br>` : ''}
                <span class="${activity.type === 'success' ? 'text-success' : activity.type === 'danger' ? 'text-danger' : ''}">
                  ${activity.message}
                </span>
              </div>
              <small class="text-muted">${activity.date}</small>
            </div>
          </div>
        </div>
      `;
      logContainer.append(activityHtml);
    });
  } catch (error) {
    console.error('Error cargando log de actividad:', error);
  }
}

function formatDate(date) {
  return date.toLocaleString('es-MX', {
    day: '2-digit',
    month: '2-digit', 
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  });
}

// Función para mostrar la vista de creación de servicio
function showServiceCreationView(clientData) {
  const serviceCard = document.querySelector('.col-md-8 .card.mb-4');
  
  if (serviceCard) {
    serviceCard.innerHTML = `
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <div class="me-3">
            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                style="width: 60px; height: 60px;">
              <i data-acorn-icon="globe" class="text-white" style="font-size: 24px;"></i>
            </div>
          </div>
          <div>
            <h5 class="mb-1">Crear un Servicio para <span>${clientData.nombre}</span></h5>
            <button class="btn btn-primary btn-sm" onclick="crearServicio()">
              <i data-acorn-icon="plus" class="me-1"></i>
              Servicio
            </button>
          </div>
        </div>
      </div>
    `;
  }
}

// Función para mostrar la vista del mapa
function showMapView(clientData) {
  const serviceCard = document.querySelector('.col-md-8 .card.mb-4');
  
  if (serviceCard) {
    serviceCard.innerHTML = `
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <div class="me-3">
            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" 
                style="width: 60px; height: 60px;">
              <i data-acorn-icon="map-pin" class="text-white" style="font-size: 24px;"></i>
            </div>
          </div>
          <div class="flex-grow-1">
            <h5 class="mb-1">Ubicación de <span>${clientData.nombre}</span></h5>
            <small class="text-muted">Servicio activo - Internet VIP FTTH</small>
          </div>
        </div>
        
        <!-- Contenedor del mapa -->
        <div id="clientMap" style="height: 300px; width: 100%; border: 1px solid #ddd; border-radius: 8px; background-color: #f8f9fa;">
          <div class="d-flex align-items-center justify-content-center h-100">
            <div class="text-center">
              <i data-acorn-icon="map-pin" class="text-muted mb-2" style="font-size: 48px;"></i>
              <p class="text-muted">Mapa de ubicación</p>
              <small class="text-muted">Lat: ${clientData.latitud || 'No disponible'}, Lng: ${clientData.longitud || 'No disponible'}</small>
            </div>
          </div>
        </div>
        
        <div class="mt-3 d-flex justify-content-between">
          <button class="btn btn-outline-primary btn-sm" onclick="verDetallesServicio()">
            <i data-acorn-icon="eye" class="me-1"></i>
            Ver Servicio
          </button>
          <button class="btn btn-outline-success btn-sm" onclick="abrirEnGoogleMaps('${clientData.latitud}', '${clientData.longitud}')">
            <i data-acorn-icon="external-link" class="me-1"></i>
            Abrir en Google Maps
          </button>
        </div>
      </div>
    `;
    
    // Si tienes coordenadas reales, puedes inicializar un mapa real aquí
    if (clientData.latitud && clientData.longitud) {
      setTimeout(() => {
        initializeSimpleMap(clientData.latitud, clientData.longitud);
      }, 100);
    }
  }
}

// Función simple para mostrar un mapa básico
function initializeSimpleMap(lat, lng) {
  const mapContainer = document.getElementById('clientMap');
  if (mapContainer) {
    mapContainer.innerHTML = `
      <div class="d-flex align-items-center justify-content-center h-100">
        <div class="text-center">
          <i data-acorn-icon="map-pin" class="text-success mb-2" style="font-size: 48px;"></i>
          <p class="mb-1"><strong>Ubicación del Cliente</strong></p>
          <small class="text-muted">Latitud: ${lat}</small><br>
          <small class="text-muted">Longitud: ${lng}</small>
        </div>
      </div>
    `;
  }
}

// Función para ver detalles del servicio
function verDetallesServicio() {
  alert('Función para ver detalles del servicio - Por implementar');
}

// Función para abrir en Google Maps
function abrirEnGoogleMaps(lat, lng) {
  if (lat && lng && lat !== 'null' && lng !== 'null') {
    window.open(`https://maps.google.com/?q=${lat},${lng}`, '_blank');
  } else {
    alert('Coordenadas no disponibles');
  }
}

// Funciones de acción
function crearServicio() {
  alert('Función para crear servicio - Por implementar');
}

function crearFactura() {
  alert('Función para crear factura - Por implementar');
}

function crearTicket() {
  alert('Función para crear ticket - Por implementar');
}

function editarCliente() {
  try {
    const urlParams = new URLSearchParams(window.location.search);
    
    // Construir URL con parámetros actuales
    const editUrl = `edit-client.php?clientId=${encodeURIComponent($('#clientId').text())}&nombre=${encodeURIComponent(urlParams.get('nombre') || '')}&apellido=${encodeURIComponent(urlParams.get('apellido') || '')}&email=${encodeURIComponent(urlParams.get('email') || '')}&telefono=${encodeURIComponent(urlParams.get('telefono') || '')}&direccion=${encodeURIComponent(urlParams.get('direccion') || '')}&nota=${encodeURIComponent(urlParams.get('nota') || '')}`;
    
    window.location.href = editUrl;
    
  } catch (error) {
    console.error('Error al redireccionar:', error);
    window.location.href = `edit.client.php?clientId=${$('#clientId').text()}`;
  }
}

function añadirEtiqueta() {
  alert('Función para añadir etiqueta - Por implementar');
}

function añadirTarea() {
  alert('Función para añadir tarea - Por implementar');
}

function verTodasTareas() {
  alert('Función para ver todas las tareas - Por implementar');
}

function subirDocumento() {
  alert('Función para subir documento - Por implementar');
}

function mostrarMasAddress() {
  const addressDiv = $('#clientAddress');
  // Toggle para mostrar/ocultar dirección completa
  addressDiv.toggleClass('text-truncate');
}

function addNewEntry() {
  const input = $('#newEntryInput');
  const message = input.val().trim();
  
  if (message) {
    const newActivity = `
      <div class="d-flex mb-3">
        <div class="me-3">
          <i data-acorn-icon="message-circle" class="text-primary"></i>
        </div>
        <div class="flex-grow-1">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <span>${message}</span>
            </div>
            <small class="text-muted">${formatDate(new Date())}</small>
          </div>
        </div>
      </div>
    `;
    
    $('#activityLog').prepend(newActivity);
    input.val('');
  }
}

// Manejar Enter en el input de nueva entrada
$('#newEntryInput').on('keypress', function(e) {
  if (e.which === 13) {
    addNewEntry();
  }
  });
  </script>
</body>
</html>