const mockClients = [
    {
        id: 1,
        idUCRM: "12345",
        nombre: "Juan Pérez García",
        email: "juan.perez@email.com",
        saldo: 0,
        plan: "Internet EstandarFTTH",
        tipo: "1" // Regular
    }
];

// Función para simular la carga de clientes con iconos más pequeños
function LClients(searchTerm = '') {
    console.log('Cargando clientes de prueba...');
    
    // Filtrar clientes si hay término de búsqueda
    let filteredClients = mockClients;
    if (searchTerm && searchTerm.trim() !== '') {
        filteredClients = mockClients.filter(client => 
            client.nombre.toLowerCase().includes(searchTerm.toLowerCase()) ||
            client.idUCRM.toLowerCase().includes(searchTerm.toLowerCase()) ||
            client.email.toLowerCase().includes(searchTerm.toLowerCase())
        );
    }
    
    // Generar HTML de la tabla con iconos más pequeños y compactos
    const tbody = document.querySelector('#tbl_clients tbody');
    if (!tbody) {
        console.error('No se encontró el tbody de la tabla');
        return;
    }
    
    tbody.innerHTML = '';
    
    filteredClients.forEach(client => {
        const fibraLabel = client.tipo === '2' ? '<span class="badge bg-info text-white ms-2">Fibra</span>' : '';
        
        const row = `
            <tr>
                <td class="text-muted">${client.idUCRM}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <span>${client.nombre}</span>
                        ${fibraLabel}
                    </div>
                </td>
                <td class="text-muted">$${client.saldo.toFixed(2)}</td>
                <td class="text-muted">${client.plan}</td>
                <td>
                    <!-- Columna Pagos: Botones más pequeños y compactos -->
                    <div class="btn-group" role="group" style="gap: 3px;">
                        <!-- Botón de factura (verde) -->
                        <button type="button" 
                                class="btn btn-sm btn-outline-success" 
                                onclick="GetData('${client.idUCRM}', '${client.nombre}', '${client.id}')" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modal-checkout"
                                title="Ver/Generar factura"
                                style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 8px; padding: 0;">
                            <i data-acorn-icon="file-text" style="width: 14px; height: 14px; color: #198754; stroke-width: 1.8;"></i>
                        </button>
                        
                        <!-- Botón de historial de pagos (azul) -->
                        <button type="button" 
                                class="btn btn-sm btn-outline-primary" 
                                onclick="showPaymentHistory('${client.idUCRM}', '${client.nombre}', '${client.id}')" 
                                title="Ver historial de pagos"
                                style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 8px; padding: 0;">
                            <i data-acorn-icon="eye" style="width: 14px; height: 14px; color: #0d6efd; stroke-width: 1.8;"></i>
                        </button>
                    </div>
                </td>
                <td>
                    <!-- Columna Status: Botón con signo de admiración más pequeño -->
                    <button type="button" 
                            class="btn btn-sm btn-outline-info" 
                            onclick="GetStatus('${client.idUCRM}', '${client.nombre}', '${client.id}', '${client.tipo}')" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modal-status"
                            title="Ver detalles de estado del cliente"
                            style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 8px; padding: 0;">
                        <span style="font-size: 16px; font-weight: bold; color: #0dcaf0; line-height: 1;">¡</span>
                    </button>
                </td>
                <td>
                    <!-- Columna Acciones: Botones más pequeños y compactos -->
                    <div class="btn-group" role="group" style="gap: 3px;">
                        <!-- Botón de editar cliente (amarillo) -->
                        <button type="button" 
                                class="btn btn-sm btn-outline-warning" 
                                onclick="editClient('${client.idUCRM}', '${client.nombre}', '${client.id}')" 
                                title="Editar cliente"
                                style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 8px; padding: 0;">
                            <i data-acorn-icon="edit" style="width: 14px; height: 14px; color: #ffc107; stroke-width: 1.8;"></i>
                        </button>
                        
                        <!-- Botón de ver perfil del cliente (gris) -->
                        <button type="button" 
                                class="btn btn-sm btn-outline-secondary" 
                                onclick="viewClientProfile('${client.idUCRM}', '${client.nombre}', '${client.id}')" 
                                title="Ver perfil del cliente"
                                style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 8px; padding: 0;">
                            <i data-acorn-icon="user" style="width: 14px; height: 14px; color: #6c757d; stroke-width: 1.8;"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `;
        tbody.innerHTML += row;
    });
    
    // Actualizar contador de items
    updateItemCount(filteredClients.length);
    
    console.log(`${filteredClients.length} clientes cargados`);
}

// FUNCIONES CON FUNCIONALIDADES MANTENIDAS (sin cambios):

// Función para mostrar historial de pagos (ahora en el ícono del ojo)
function showPaymentHistory(idUCRM, nombre, clientId) {
    console.log(`Mostrando historial de pagos para cliente: ${nombre} (${idUCRM})`);
    
    // Por ahora solo mostrar un alert hasta que tengas el modal listo
    alert(`Historial de pagos para: ${nombre}\n\nEsta funcionalidad se implementará cuando agregues el modal correspondiente.`);
    
    // Cuando tengas el modal listo, descomenta este código:
    /*
    // Aquí iría tu lógica para cargar y mostrar el historial de pagos
    const paymentHistory = [
        { date: '2024-01-15', amount: 50.00, method: 'Efectivo', status: 'Pagado' },
        { date: '2024-02-15', amount: 50.00, method: 'Transferencia', status: 'Pagado' },
        { date: '2024-03-15', amount: 50.00, method: 'Tarjeta', status: 'Pendiente' }
    ];
    
    // Actualizar el contenido del modal de historial de pagos
    updatePaymentHistoryModal(nombre, paymentHistory);
    
    // Mostrar el modal
    const modal = new bootstrap.Modal(document.getElementById('modal-payment-history'));
    modal.show();
    */
}

// NUEVA: Función para editar cliente - Redirige a edit-client.php
function editClient(idUCRM, nombre, clientId) {
    console.log(`Redirigiendo a editar cliente: ${nombre} (${idUCRM})`);
    
    // Redirección usando solo el ID del cliente (más limpio y seguro)
    window.location.href = `edit-client.php?client_id=${clientId}`;
}

// NUEVA: Función para ver perfil del cliente - Redirige a client.php
function viewClientProfile(idUCRM, nombre, clientId) {
    console.log(`Redirigiendo a ver perfil del cliente: ${nombre} (${idUCRM})`);
    
    // Redirección usando solo el ID del cliente (consistente con editClient)
    window.location.href = `client.php?client_id=${clientId}`;
}

// Función para llenar el formulario de edición (para cuando implementes el modal)
function fillEditForm(client) {
    // Llenar los campos del formulario de edición
    const form = document.getElementById('edit-client-form');
    if (form) {
        form.querySelector('#edit-idUCRM').value = client.idUCRM;
        form.querySelector('#edit-nombre').value = client.nombre;
        form.querySelector('#edit-email').value = client.email;
        form.querySelector('#edit-saldo').value = client.saldo;
        form.querySelector('#edit-plan').value = client.plan;
        form.querySelector('#edit-tipo').value = client.tipo;
    }
}

// Función para actualizar el modal de perfil (para cuando implementes el modal)
function updateProfileModal(client) {
    const modalTitle = document.querySelector('#modal-client-profile .modal-title');
    const modalBody = document.querySelector('#modal-client-profile .modal-body');
    
    if (modalTitle) {
        modalTitle.textContent = `Perfil de ${client.nombre}`;
    }
    
    if (modalBody) {
        const statusBadge = client.saldo > 0 ? 
            '<span class="badge bg-success">Al corriente</span>' : 
            '<span class="badge bg-warning">Sin saldo</span>';
        
        const typeBadge = client.tipo === '2' ? 
            '<span class="badge bg-info">Fibra Óptica</span>' : 
            '<span class="badge bg-secondary">Regular</span>';
        
        modalBody.innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-muted">Información Personal</h6>
                    <p><strong>Nombre:</strong> ${client.nombre}</p>
                    <p><strong>Email:</strong> ${client.email}</p>
                    <p><strong>ID UCRM:</strong> ${client.idUCRM}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted">Información del Servicio</h6>
                    <p><strong>Plan:</strong> ${client.plan}</p>
                    <p><strong>Tipo:</strong> ${typeBadge}</p>
                    <p><strong>Saldo:</strong> $${client.saldo.toFixed(2)} ${statusBadge}</p>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-warning btn-sm" onclick="editClient('${client.idUCRM}', '${client.nombre}', '${client.id}')">
                    <i class="fas fa-edit me-1"></i> Editar Cliente
                </button>
                <button type="button" class="btn btn-primary btn-sm" onclick="showPaymentHistory('${client.idUCRM}', '${client.nombre}', '${client.id}')">
                    <i class="fas fa-history me-1"></i> Ver Historial
                </button>
            </div>
        `;
    }
}

// Función para actualizar el modal de historial de pagos
function updatePaymentHistoryModal(clientName, history) {
    // Buscar elementos del modal y actualizar contenido
    const modalTitle = document.querySelector('#modal-payment-history .modal-title');
    const modalBody = document.querySelector('#modal-payment-history .modal-body');
    
    if (modalTitle) {
        modalTitle.textContent = `Historial de Pagos - ${clientName}`;
    }
    
    if (modalBody && history) {
        let historyHTML = `
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Método</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
        `;
        
        history.forEach(payment => {
            const statusClass = payment.status === 'Pagado' ? 'badge bg-success' : 'badge bg-warning';
            historyHTML += `
                <tr>
                    <td>${payment.date}</td>
                    <td>$${payment.amount.toFixed(2)}</td>
                    <td>${payment.method}</td>
                    <td><span class="${statusClass}">${payment.status}</span></td>
                </tr>
            `;
        });
        
        historyHTML += `
                    </tbody>
                </table>
            </div>
        `;
        
        modalBody.innerHTML = historyHTML;
    }
}

// Función auxiliar para actualizar el contador
function updateItemCount(count) {
    // Actualizar el contador en el dropdown
    const itemCountElements = document.querySelectorAll('.dropdown-toggle span');
    itemCountElements.forEach(el => {
        if (el.textContent.includes('Items')) {
            el.textContent = `${count} Items`;
        }
    });
    
    // También actualizar si hay un elemento específico para el contador
    const itemCountElement = document.getElementById('itemCount');
    if (itemCountElement) {
        itemCountElement.textContent = `${count} Items`;
    }
}