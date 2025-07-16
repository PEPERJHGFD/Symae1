// save-client-simulator.js - Simulador de guardado de clientes
// Esta función simula la respuesta del servidor cuando se guarda un cliente

// Gestor de datos mock para simular base de datos
const mockDataManager = {
    clients: JSON.parse(localStorage.getItem('mockClients') || '[]'),
    nextId: parseInt(localStorage.getItem('nextClientId') || '1000'),
    
    // Guardar en localStorage para persistencia
    save() {
        localStorage.setItem('mockClients', JSON.stringify(this.clients));
        localStorage.setItem('nextClientId', this.nextId.toString());
    },
    
    // Añadir nuevo cliente
    addClient(formData) {
        const newClient = {
            id: this.nextId++,
            txtNombre: formData.txtNombre || '',
            txtApellido: formData.txtApellido || '',
            txtTelefono: formData.txtTelefono || '',
            txtDireccion: formData.txtDireccion || '',
            txtEmail: formData.txtEmail || '',
            txtNota: formData.txtNota || '',
            chkTieneServicio: formData.chkTieneServicio || false,
            txtLatitud: formData.txtLatitud || '',
            txtLongitud: formData.txtLongitud || '',
            nacionalidad: formData.nacionalidad || 'MX',
            fechaCreacion: new Date().toISOString(),
            fechaActualizacion: new Date().toISOString()
        };
        
        this.clients.push(newClient);
        this.save();
        return newClient;
    },
    
    // Obtener cliente por ID
    getClient(id) {
        return this.clients.find(client => client.id === parseInt(id));
    },
    
    // Obtener todos los clientes
    getAllClients() {
        return this.clients;
    },
    
    // Verificar si ya existe un cliente con el mismo teléfono
    existsClientWithPhone(phone) {
        return this.clients.some(client => client.txtTelefono === phone);
    }
};

// Reglas de validación (simulando las del servidor)
const validationRules = {
    required_fields: ['txtNombre', 'txtApellido', 'txtTelefono', 'txtDireccion'],
    email_fields: ['txtEmail'],
    numeric_fields: ['txtLatitud', 'txtLongitud'],
    boolean_fields: ['chkTieneServicio'],
    min_lengths: {
        txtNombre: 2,
        txtApellido: 2,
        txtTelefono: 10
    },
    max_lengths: {
        txtNombre: 50,
        txtApellido: 50,
        txtTelefono: 15,
        txtDireccion: 200,
        txtEmail: 100,
        txtNota: 500
    }
};

// Función para validar datos del formulario
function validateFormData(formData) {
    const errors = [];
    
    // Validar campos requeridos
    validationRules.required_fields.forEach(field => {
        if (!formData[field] || formData[field].trim() === '') {
            errors.push(`El campo ${field.replace('txt', '')} es requerido`);
        }
    });
    
    // Validar longitudes mínimas
    Object.entries(validationRules.min_lengths).forEach(([field, minLength]) => {
        if (formData[field] && formData[field].length < minLength) {
            errors.push(`El campo ${field.replace('txt', '')} debe tener al menos ${minLength} caracteres`);
        }
    });
    
    // Validar longitudes máximas
    Object.entries(validationRules.max_lengths).forEach(([field, maxLength]) => {
        if (formData[field] && formData[field].length > maxLength) {
            errors.push(`El campo ${field.replace('txt', '')} no puede exceder ${maxLength} caracteres`);
        }
    });
    
    // Validar formato de email
    validationRules.email_fields.forEach(field => {
        if (formData[field] && formData[field].trim() !== '') {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(formData[field])) {
                errors.push(`El campo ${field.replace('txt', '')} debe ser un email válido`);
            }
        }
    });
    
    // Validar formato de teléfono
    if (formData.txtTelefono) {
        const phoneRegex = /^[0-9+\-\s()]+$/;
        if (!phoneRegex.test(formData.txtTelefono)) {
            errors.push('El teléfono solo debe contener números, espacios, guiones, paréntesis y el signo +');
        }
    }
    
    // Validar coordenadas si están presentes
    if (formData.txtLatitud && formData.txtLatitud !== '') {
        const lat = parseFloat(formData.txtLatitud);
        if (isNaN(lat) || lat < -90 || lat > 90) {
            errors.push('La latitud debe ser un número entre -90 y 90');
        }
    }
    
    if (formData.txtLongitud && formData.txtLongitud !== '') {
        const lng = parseFloat(formData.txtLongitud);
        if (isNaN(lng) || lng < -180 || lng > 180) {
            errors.push('La longitud debe ser un número entre -180 y 180');
        }
    }
    
    // Validar que no exista otro cliente con el mismo teléfono
    if (formData.txtTelefono && mockDataManager.existsClientWithPhone(formData.txtTelefono)) {
        errors.push('Ya existe un cliente registrado con este número de teléfono');
    }
    
    return errors;
}

// Función para construir URL de redirección
function buildRedirectUrl(clientId, formData) {
    const params = {
        clientId: clientId,
        nombre: formData.txtNombre || '',
        apellido: formData.txtApellido || '',
        telefono: formData.txtTelefono || '',
        direccion: formData.txtDireccion || '',
        email: formData.txtEmail || '',
        nota: formData.txtNota || '',
        tieneServicio: formData.chkTieneServicio ? 'true' : 'false',
        latitud: formData.txtLatitud || '',
        longitud: formData.txtLongitud || '',
        success: '1'
    };
    
    // Filtrar parámetros vacíos
    const filteredParams = Object.entries(params)
        .filter(([key, value]) => value !== '' && value !== null && value !== undefined)
        .map(([key, value]) => `${encodeURIComponent(key)}=${encodeURIComponent(value)}`)
        .join('&');
    
    return `client.php?${filteredParams}`;
}

// Función principal para simular el guardado de cliente
function simulateSaveClient(formData) {
    return new Promise((resolve, reject) => {
        // Simular tiempo de procesamiento del servidor (500ms - 1.5s)
        const processingTime = Math.random() * 1000 + 500;
        
        setTimeout(() => {
            try {
                // Limpiar y normalizar datos
                const cleanedData = {};
                Object.entries(formData).forEach(([key, value]) => {
                    if (typeof value === 'string') {
                        cleanedData[key] = value.trim();
                    } else {
                        cleanedData[key] = value;
                    }
                });
                
                // Validar datos
                const validationErrors = validateFormData(cleanedData);
                
                if (validationErrors.length > 0) {
                    reject({
                        success: false,
                        message: 'Errores de validación encontrados',
                        errors: validationErrors,
                        error_code: 'VALIDATION_ERROR'
                    });
                    return;
                }
                
                // Simular guardado exitoso
                const newClient = mockDataManager.addClient(cleanedData);
                
                if (newClient) {
                    const redirectUrl = buildRedirectUrl(newClient.id, cleanedData);
                    
                    // Simular respuesta exitosa del servidor
                    resolve({
                        success: true,
                        message: `Cliente ${newClient.txtNombre} ${newClient.txtApellido} creado exitosamente`,
                        clientId: newClient.id,
                        redirect_url: redirectUrl,
                        client_data: newClient,
                        timestamp: new Date().toISOString()
                    });
                } else {
                    reject({
                        success: false,
                        message: 'Error interno del servidor al crear el cliente',
                        error_code: 'INTERNAL_ERROR'
                    });
                }
                
            } catch (error) {
                reject({
                    success: false,
                    message: `Error del servidor: ${error.message}`,
                    error_code: 'SERVER_ERROR'
                });
            }
        }, processingTime);
    });
}

// Función para simular la respuesta AJAX (para formularios con AJAX)
function simulateAjaxSaveClient(formData) {
    return simulateSaveClient(formData)
        .then(response => {
            // Simular headers HTTP de respuesta exitosa
            return {
                status: 200,
                statusText: 'OK',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Response-Time': '1.2s'
                },
                data: response
            };
        })
        .catch(error => {
            // Simular respuesta HTTP de error
            return Promise.reject({
                status: 400,
                statusText: 'Bad Request',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Response-Time': '0.8s'
                },
                data: error
            });
        });
}

// Función para resetear datos mock (útil para testing)
function resetMockData() {
    localStorage.removeItem('mockClients');
    localStorage.removeItem('nextClientId');
    mockDataManager.clients = [];
    mockDataManager.nextId = 1000;
}

// Función para obtener estadísticas de clientes mock
function getMockStats() {
    return {
        totalClients: mockDataManager.clients.length,
        clientsWithService: mockDataManager.clients.filter(c => c.chkTieneServicio).length,
        clientsWithEmail: mockDataManager.clients.filter(c => c.txtEmail && c.txtEmail !== '').length,
        clientsWithLocation: mockDataManager.clients.filter(c => c.txtLatitud && c.txtLongitud).length,
        lastClientId: mockDataManager.nextId - 1
    };
}

// Exportar funciones para uso en otros archivos
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        simulateSaveClient,
        simulateAjaxSaveClient,
        mockDataManager,
        resetMockData,
        getMockStats,
        validateFormData
    };
}

// Hacer funciones disponibles globalmente en el navegador
if (typeof window !== 'undefined') {
    window.simulateSaveClient = simulateSaveClient;
    window.simulateAjaxSaveClient = simulateAjaxSaveClient;
    window.mockDataManager = mockDataManager;
    window.resetMockData = resetMockData;
    window.getMockStats = getMockStats;
}

// Inicializar datos de prueba si no existen
if (mockDataManager.clients.length === 0) {
    console.log('Simulador de guardado de clientes iniciado');
    console.log('Uso: simulateSaveClient(formData).then(response => {...}).catch(error => {...})');
}