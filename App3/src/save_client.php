<?php
include("seguro.php");
header('Content-Type: application/json');

// Función para cargar y procesar la estructura JSON
function loadClientStructure() {
    $jsonFile = 'json/client-structure.json';
    if (!file_exists($jsonFile)) {
        throw new Exception("Archivo de estructura JSON no encontrado");
    }
    
    $jsonContent = file_get_contents($jsonFile);
    $structure = json_decode($jsonContent, true);
    
    if (!$structure) {
        throw new Exception("Error al decodificar JSON");
    }
    
    return $structure;
}

// Función para mapear datos del formulario a la estructura de BD
function mapFormDataToDatabase($formData) {
    $structure = loadClientStructure();
    $mapping = $structure['form_mapping'];
    $clientData = $structure['client_structure'];
    $validationRules = $structure['validation_rules'];
    $defaultValues = $structure['default_values'];
    
    // Aplicar valores por defecto
    foreach ($defaultValues as $field => $value) {
        if ($value === 'auto_current_datetime') {
            $clientData[$field] = date('Y-m-d\TH:i:sP');
        } else {
            $clientData[$field] = $value;
        }
    }
    
    // Mapear datos del formulario
    foreach ($mapping as $formField => $dbField) {
        if (isset($formData[$formField])) {
            $value = trim($formData[$formField]);
            
            // Aplicar conversiones según el tipo de campo
            if (in_array($dbField, $validationRules['numeric_fields'])) {
                $clientData[$dbField] = floatval($value);
            } elseif (in_array($dbField, $validationRules['boolean_fields'])) {
                $clientData[$dbField] = intval($value);
            } elseif ($dbField === 'countryId') {
                // Conversión especial para nacionalidad
                $clientData[$dbField] = ($value === 'MX') ? 1 : 2;
            } else {
                $clientData[$dbField] = $value;
            }
        }
    }
    
    // Si no hay email, usar el teléfono como username
    if (empty($clientData['username']) && !empty($clientData['userIdent'])) {
        $clientData['username'] = $clientData['userIdent'];
    }
    
    return $clientData;
}

// Función para validar datos
function validateClientData($clientData, $validationRules) {
    $errors = [];
    
    // Validar campos requeridos
    foreach ($validationRules['required_fields'] as $field) {
        if (empty($clientData[$field])) {
            $errors[] = "El campo {$field} es requerido";
        }
    }
    
    // Validar formato de email
    foreach ($validationRules['email_fields'] as $field) {
        if (!empty($clientData[$field]) && !filter_var($clientData[$field], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "El campo {$field} debe ser un email válido";
        }
    }
    
    return $errors;
}

// Función para generar un ID simulado (ya que no hay BD)
function generateClientId() {
    return rand(1000, 9999);
}

// Función para guardar datos en archivo temporal (simulación)
function saveClientData($clientData) {
    $clientId = generateClientId();
    $clientData['id'] = $clientId;
    
    // Crear directorio de datos temporales si no existe
    $dataDir = 'temp_clients';
    if (!is_dir($dataDir)) {
        mkdir($dataDir, 0755, true);
    }
    
    // Guardar en archivo JSON temporal
    $filename = $dataDir . '/client_' . $clientId . '.json';
    file_put_contents($filename, json_encode($clientData, JSON_PRETTY_PRINT));
    
    return $clientId;
}

// Función para construir URL con datos del cliente
function buildClientUrl($clientId, $formData) {
    $params = [
        'clientId' => $clientId,
        'nombre' => $formData['txtNombre'] ?? '',
        'apellido' => $formData['txtApellido'] ?? '',
        'telefono' => $formData['txtTelefono'] ?? '',
        'direccion' => $formData['txtDireccion'] ?? '',
        'email' => $formData['txtEmail'] ?? '',
        'nota' => $formData['txtNota'] ?? '',
        'tieneServicio' => isset($formData['chkTieneServicio']) ? 'true' : 'false',
        'latitud' => $formData['txtLatitud'] ?? '',
        'longitud' => $formData['txtLongitud'] ?? '',
        'success' => '1'
    ];
    
    // Limpiar parámetros vacíos para una URL más limpia
    $params = array_filter($params, function($value) {
        return $value !== '' && $value !== null;
    });
    
    return 'client.php?' . http_build_query($params);
}

// En lugar de echo json_encode(), usar redirección directa
// Reemplaza el final del archivo save_client.php:

try {
    // ... código existente ...
    
    // Guardar cliente (simulación)
    $clientId = saveClientData($clientData);
    
    // Construir URL con todos los datos del cliente
    $redirectUrl = buildClientUrl($clientId, $_POST);
    
    // Si la petición es AJAX, devolver JSON
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        echo json_encode([
            'success' => true,
            'message' => 'Cliente guardado exitosamente',
            'clientId' => $clientId,
            'data' => $clientData,
            'redirect_url' => $redirectUrl
        ]);
    } else {
        // Si es una petición normal, redirigir directamente
        header('Location: ' . $redirectUrl);
        exit();
    }
    
} catch (Exception $e) {
    // Respuesta de error
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage(),
            'error_code' => 'VALIDATION_ERROR'
        ]);
    } else {
        // Para peticiones normales, redirigir con error
        header('Location: form_cliente.php?error=' . urlencode($e->getMessage()));
        exit();
    }
}
?>