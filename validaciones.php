<?php

function validarDNI($dni) {
    // Verificar si el DNI tiene exactamente 8 dígitos y no contiene letras
    return (is_numeric($dni) && strlen($dni) === 8);
}
function validarEmail($email) {
    // Verificar el formato del correo electrónico
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validarTelefono($telefono) {
    // Verificar el formato del número de telefono (al menos 5 dígitos sin límite superior)
    return preg_match('/^\d{5,}$/', $telefono);
}

function validarNombreApellido($nombre) {
    // Verificar que el campo "Nombre y Apellido" tenga un formato válido (nombre espacio apellido)
    return preg_match('/^[a-zA-ZñÑ]+\s[a-zA-ZñÑ]+$/', $nombre);
}

function validarContraseña($pass1) {
    // Verificar que la contraseña tenga al menos 8 caracteres
    // y contenga al menos una letra mayúscula, una letra minúscula y un número.
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $pass1);
}

function validarLocalidad($localidad) {
    // Permitir letras, espacios y caracteres especiales como acentos (áéíóúüñ)
    return preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÜüÑñ\s]*$/', $localidad);
}

function validarDireccion($direccion) {
    // Permitir letras, números, espacios, algunos caracteres especiales, acentos y requerir un número después del nombre
    return preg_match('/^[\p{L}0-9\s.,-]+ \d+$/u', $direccion);
}

function validarDocumento($dni_cuit) {
    $dni_cuit = preg_replace('/[^0-9]/', '', $dni_cuit); // Eliminar caracteres no numéricos

    $length = strlen($dni_cuit);

    return (is_numeric($dni_cuit) && ($length === 8 || $length === 11));
}

function validarCUIT($cuit){
    return(is_numeric($cuit) && strlen($cuit) === 11);
}

function validarRazonSocial($razonsocial) {
    // Permitir letras, números, espacios y algunos caracteres especiales como coma, punto y guion
    return preg_match('/^[A-Za-z0-9\s.,-]+$/u', $razonsocial);
}
?>