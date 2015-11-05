# Librería PHP para Cuenta Digital

[![Build Status](https://travis-ci.org/amsolucionesweb/cuentadigital.svg?branch=master)](https://travis-ci.org/amsolucionesweb/cuentadigital)
[![Code Quality](https://scrutinizer-ci.com/g/amsolucionesweb/cuentadigital/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/amsolucionesweb/cuentadigital)
[![Code Coverage](https://scrutinizer-ci.com/g/amsolucionesweb/cuentadigital/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/amsolucionesweb/cuentadigital)
[![Version](http://img.shields.io/packagist/v/amsolucionesweb/cuentadigital.svg?style=flat)](https://packagist.org/packages/amsolucionesweb/cuentadigital)

Esta librería permite integrar tu aplicación PHP con la plataforma de pago Cuenta Digital, pudiendo generar cupones de pago y exportar reportes de pagos realizados.

## Instalación
Para instalar vía composer agregar la siguiente línea a composer.json
```
{
    "require": {
        "amsolucionesweb/cuentadigital" : "1.0.*"
    }
}
```
Luego ejecutar el comando
`composer install`

## Como usarla
Ver [ejemplos!](https://github.com/amsolucionesweb/cuentadigital/tree/master/ejemplos)

## Configuración para obtener reportes de pago

Ir a "Herramientas de Venta" -> "Reporte de pagos" y establecer la configuración de la siguiente forma:

- Operaciones completadas de que fecha: Dare la fecha en el llamado
- Horario de la operación (HHmmss): activo
- Fecha de recepción: activo
- Formato de fecha de recepción: YYYYMMDD	
- Monto Bruto (monto original): activo
- Monto Neto: activo	
- Comisión: activo	
- Montos sin redondeo (3 decimales en lugar de 2): activo	
- Formato de los montos: 1000.50
- Código de barras: activo	
- Referencia: activo	
- Operaciones: Recibidas	
- Medio de pago usado: activo	
- Código interno único de operación: activo	
- Linea final en archivo indicando cantidad de cobros recibidos, monto total, fecha y checksum: activo
- Clave de seguridad: colocar una clave cualquiera	
- Separador de variables: |

## Como correr los tests

Ir al directorio del proyecto y descargar phpunit  `wget https://phar.phpunit.de/phpunit.phar`

Luego ejecutar `php phpunit.phar --bootstrap src/autoload.php  tests`
