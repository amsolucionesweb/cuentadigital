<?php

// muestra generar un reporte
// Prestar atención a como se debe configurar cuenta digital para exportar

error_reporting(E_ALL);
ini_set('display_errors', 'stdout');

require '../src/autoload.php';

use Am\CuentaDigital\Cliente;


$idCuentaDigital = 99999;
$hashControl = '20bc02118c99999e0f1eca71c282c47c';
$claveSeguridad = '999999999999999';
$modoDesarrollo = true;

$cliente = new Cliente($idCuentaDigital, $hashControl, $claveSeguridad, $modoDesarrollo);
//$cliente->setCurlTimeout(1000);

try {
    $reporte = $cliente->getReportePagos('20150806');

    print_r($reporte);
} catch (\Exception $e) {
    echo 'Error: '.$e->getMessage();
}