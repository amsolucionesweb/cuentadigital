<?php

// muestra cómo generar un cupón de pago
error_reporting(E_ALL);
ini_set('display_errors', 'stdout');

require '../src/Am/CuentaDigital/Cupon.php';
require '../src/Am/CuentaDigital/CuponResponse.php';
require '../src/Am/CuentaDigital/Cliente.php';

//use Am\CuentaDigital\Cupon;
//use Am\CuentaDigital\Cliente;

$idCuentaDigital = 'un id';
$hashControl = 'un hash';
$modoDesarrollo = false;

$cliente = new Am\CuentaDigital\Cliente($idCuentaDigital, $hashControl, $modoDesarrollo);

$cupon = $cliente->getNuevoCupon();

$cupon->setPrecio(20.52);
$cupon->setVencimiento(7);
$cupon->setCodigo('4567892');
$cupon->setConcepto('Compra sitio web');

try {
    $respuesta = $cliente->generarCupon($cupon);
} catch (\Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

print_r($respuesta);
?>
