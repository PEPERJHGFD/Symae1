// client-handler.js - Manejador de operaciones de clientes

// Función para manejar el envío del formulario de nuevo cliente
function handleNewClientSubmit(event) {
    event.preventDefault();
    
    // Validar formulario
    if (!validateForm()) {
        return false;
    }
    
    // Mostrar spinner
    $('#spinner-div').show();
    
    // Retrasar para simular operación de red
    setTimeout(() => {
        try {
            // Preparar datos del formulario
            const formData = prepareFormData();
            
            // Guardar en el sistema mock
            const newClient = mockDataManager.addClient(formData);
            
            if (newClient) {
                // Ocultar spinner
                $('#spinner-div').hide();
                
                // Mostrar mensaje de éxito
                showSuccessMessage(
                    `Cliente ${newClient.txtNombre} ${newClient.txtApellido} creado exitosamente`, 
                    newClient.id
                );
                
                // Redirigir al perfil del cliente después de 2 segundos
                setTimeout(() => {
                    window.location.href = `client.php?id=${newClient.id}&success=1`;
                }, 2000);
                
            } else {
                throw new Error('No se pudo crear el cliente');
            }
            
        } catch (error) {
            $('#spinner-div').hide();
            showErrorMessage('Error al crear el cliente: ' + error.message);
        }
    }, 1000); // Simular 1 segundo de procesamiento
    
    return false;
}

// Función para guardar cliente (llamada desde el botón)
function saveClient() {
    const form = document.getElementById('formAddClient');
    if (form) {
        const event = new Event('submit');
        form.dispatchEvent(event);
    }
}

// Función para cargar datos del cliente en el perfil
function loadClientProfile(clientId) {
    if (!clientId) {
        console.error('ID de cliente no proporcionado');
        return;
    }
    
    const client = mockDataManager.getClientById(clientId);
    
    if (!client) {
        console.error('Cliente no encontrado:', clientId);
        return;
    }
    
    // Rellenar campos del perfil si existen
    fillProfileFields(client);
    
    // Mostrar información adicional
    displayClientInfo(client);
    
    return client;
}

// Función para rellenar campos del perfil
function fillProfileFields(client) {
    // Campos básicos
    const fields = [
        'txtNombre', 'txtApellido', 'txtEmail', 'txtTelefono',
        'txtDireccion', 'txtCalle', 'txtCalle2', 'txtCiudad',
        'txtCodigoPostal', 'txtLatitud', 'txtLongitud', 'txtNota'
    ];
    
    fields.forEach(fieldName => {
        const element = document.getElementById(fieldName);
        if (element && client[fieldName] !== undefined) {
            element.value = client[fieldName];
        }
    });
    
    // Campos especiales
    const idField = document.getElementById('txtID');
    if (idField) {
        idField.value = client.id;
    }
    
    const nacionalidadSelect = document.getElementById('selectNacionalidad');
    if (nacionalidadSelect && client.selectNacionalidad) {
        nacionalidadSelect.value = client.selectNacionalidad;
    }
    
    const checkUsarCorreo = document.getElementById('checkUsarCorreo');
    if (checkUsarCorreo) {
        checkUsarCorreo.checked = client.checkUsarCorreo;
    }
    
    // Fecha de registro
    const fechaRegistroElement = document.getElementById('fechaRegistro');
    if (fechaRegistroElement && client.fechaRegistro) {
        fechaRegistroElement.textContent = client.fechaRegistro;
    }
    
    // Mostrar nota si existe
    if (client.txtNota) {
        const noteSection = document.getElementById('noteSection');
        const linkAddNote = document.getElementById('linkAddNote');
        
        if (noteSection && linkAddNote) {
            noteSection.style.display = 'block';
            linkAddNote.innerHTML = '<i data-acorn-icon="minus" class="me-1"></i>Ocultar nota';
        }
    }
}

// Función para mostrar información adicional del cliente
function displayClientInfo(client) {
    // Actualizar título de la página si es necesario
    const titleElement = document.getElementById('title');
    if (titleElement) {
        titleElement.innerHTML = `
            <span style="color:rgb(1, 7, 8);">
                ${client.txtNombre} ${client.txtApellido}
            </span>
            <small class="text-muted d-block">ID: ${client.id}</small>
        `;
    }
    
    // Mostrar saldo si hay un elemento para ello
    const saldoElement = document.getElementById('clientSaldo');
    if (saldoElement) {
        const saldoClass = client.saldo >= 0 ? 'text-success' : 'text-danger';
        const saldoText = client.saldo >= 0 ? `$${client.saldo.toFixed(2)}` : `-$${Math.abs(client.saldo).toFixed(2)}`;
        saldoElement.innerHTML = `<span class="${saldoClass}">${saldoText}</span>`;
    }
    
    // Mostrar status
    const statusElement = document.getElementById('clientStatus');
    if (statusElement) {
        const statusClass = client.status === 'Activo' ? 'success' : 'warning';
        statusElement.innerHTML = `<span class="badge bg-${statusClass}">${client.status}</span>`;
    }
    
    // Mostrar planes de servicio
    const planesElement = document.getElementById('clientPlanes');
    if (planesElement) {
        if (client.planesServicio && client.planesServicio.length > 0) {
            planesElement.innerHTML = client.planesServicio
                .map(plan => `<span class="badge bg-primary me-1">${plan}</span>`)
                .join('');
        } else {
            planesElement.innerHTML = '<span class="text-muted">Sin planes asignados</span>';
        }
    }
}

// Función para actualizar cliente existente
function updateClient(clientId, updateData) {
    const updatedClient = mockDataManager.updateClient(clientId, updateData);
    
    if (updatedClient) {
        showSuccessMessage('Cliente actualizado exitosamente');
        
        // Recargar datos en el perfil
        setTimeout(() => {
            loadClientProfile(clientId);
        }, 1000);
        
        return true;
    } else {
        showErrorMessage('Error al actualizar el cliente');
        return false;
    }
}

// Función para manejar el guardado de pagos
function SavePay(idUCRM, idcli, method, fecha, hora, autorizacion, monto, notas, nombreCliente) {
    const paymentData = {
        method: method,
        fecha: fecha,
        hora: hora,
        autorizacion: autorizacion,
        monto: monto,
        notas: notas
    };
    
    const result = mockDataManager.addPayment(idcli, paymentData);
    
    if (result.success) {
        // Cerrar modal
        $('#modal-checkout').modal('hide');
        
        // Mostrar mensaje de éxito
        showSuccessMessage(`Pago de $${monto} registrado exitosamente para ${nombreCliente}`);
        
        // Recargar tabla de clientes
        setTimeout(() => {
            LClients(document.getElementById('txtbuscacli')?.value || '');
        }, 1000);
        
    } else {
        showErrorMessage('Error al registrar el pago: ' + result.error);
    }
}

// Función para obtener status (simulación)
function GetStatusStatic(idUCRM, idcli) {
    const client = mockDataManager.getClientById(idcli);
    
    if (client) {
        // Simular datos de status
        const statusData = {
            status: client.status,
            mode: 'STATIC - 10.3.12.44',
            cpe: 'LiteBeam 5AC - E0:63:DA:FA:6F:93',
            signal: '-62 dBm dBm / -62 dBm dBm',
            accessPoint: 'DriverMedia_SEC_Aca01',
            site: 'Acatlan'
        };
        
        // Aquí puedes mostrar los datos en el modal
        displayClientStatus(statusData);
    }
}

// Función para obtener status de fibra (simulación)
function GetStatusFiber(idUCRM, idcli) {
    const client = mockDataManager.getClientById(idcli);
    
    if (client) {
        // Simular datos de status para fibra
        const statusData = {
            status: client.status,
            mode: 'FIBER - 192.168.1.100',
            cpe: 'ONT Fiber - A1:B2:C3:D4:E5:F6',
            signal: '-15 dBm / -15 dBm',
            accessPoint: 'DriverMedia_FIBER_Aca01',
            site: 'Acatlan'
        };
        
        displayClientStatus(statusData);
    }
}

// Función para mostrar status del cliente
function displayClientStatus(statusData) {
    const statusContainer = document.getElementById('tblstatusClient');
    if (statusContainer) {
        statusContainer.innerHTML = `
            <table class="table table-striped">
                <tr>
                    <th>STATUS</th>
                    <td>
                        <span class="badge ${statusData.status === 'Activo' ? 'bg-success' : 'bg-warning'}">
                            ${statusData.status}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>MODE</th>
                    <td>
                        ${statusData.mode}
                        <i class="fas fa-globe text-success ms-2"></i>
                    </td>
                </tr>
                <tr>
                    <th>CPE</th>
                    <td>
                        ${statusData.cpe}
                        <i class="fas fa-check-circle text-success ms-2"></i>
                    </td>
                </tr>
                <tr>
                    <th>SIGNAL</th>
                    <td>
                        ${statusData.signal}
                        <i class="fas fa-signal text-success ms-2"></i>
                    </td>
                </tr>
                <tr>
                    <th>ACCESS POINT</th>
                    <td>${statusData.accessPoint}</td>
                </tr>
                <tr>
                    <th>SITE</th>
                    <td>${statusData.site}</td>
                </tr>
            </table>
        `;
    }
}

// Función para inicializar el sistema al cargar la página
function initializeClientSystem() {
    // Verificar si estamos en la página de perfil de cliente
    const urlParams = new URLSearchParams(window.location.search);
    const clientId = urlParams.get('id');
    
    if (clientId && window.location.pathname.includes('client.php')) {
        // Cargar datos del cliente
        loadClientProfile(clientId);
        
        // Mostrar mensaje de éxito si viene de crear cliente
        if (urlParams.get('success') === '1') {
            setTimeout(() => {
                showSuccessMessage('Cliente creado exitosamente');
            }, 500);
        }
    }
    
    // Si estamos en la página de clientes, cargar la tabla
    if (window.location.pathname.includes('Customers.php')) {
        LClients('');
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    initializeClientSystem();
});

// Función para refrescar la tabla de clientes
function refreshClientsTable() {
    const searchTerm = document.getElementById('txtbuscacli')?.value || '';
    LClients(searchTerm);
}