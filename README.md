# Symae1
Symae
## 1. Comando para acceder
'''
php -S 0.0.0.0:8000
'''

## 2. Comandos para gauradar cambios 
'''
git add .
git commit -m "mensaje"
git push -u origin main
'''
## 3. Comando para bajar cambios
'''
git pull
'''

## 4. Archivo seguro
''' 
Archivo de prueba para poder acceder
<?php
session_start();

// Usuario de prueba temporal para desarrollo
if (!isset($_SESSION['userlog'])) {
    $_SESSION['userlog'] = [
        'nombre' => 'Usuario de Prueba',
        'rol' => 'admin', // o el rol que necesites
        'id' => 999
    ];
}

// Continúa con tu lógica normal de seguridad después de esto
'''

