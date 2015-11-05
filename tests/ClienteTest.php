<?php
/**
 * Se encarga de interactuar con el webservice de Cuenta Digital
 *
 * @author Andrés Michel <dev@amsolucionesweb.com.ar>
 */

use Am\CuentaDigital\Cliente;

class ClienteTest extends PHPUnit_Framework_TestCase
{
    /**
     * @cover Cliente::getNuevoCupon
     */
    public function testGetNuevoCupon()
    {
        $cliente = new Cliente(123456);

        $cupon = $cliente->getNuevoCupon();

        $this->assertEquals(123456, $cupon->getId());

    }

    /**
     * @cover Cliente::generarCupon
     */
    public function testGenerarCuponCorrecto()
    {
        $cliente = $this->getMockBuilder('Am\CuentaDigital\Cliente')
            ->setMethods(array('_call'))
            ->setConstructorArgs(array(123456))
            ->getMock();

        $cliente->expects($this->any())
            ->method('_call')
            ->willReturn(
                '<?xml version="1.0" encoding="ISO-8859-1"?>
                            <REQUEST>
                            <ACTION>INVOICE_GENERATED</ACTION>
                            <INVOICE>
                            <MERCHANTID>123456</MERCHANTID>
                            <IPADDRESS>190.999.219.177</IPADDRESS>
                            <PAYMENTCODE1>01909999237200</PAYMENTCODE1>
                            <PAYMENTCODE2></PAYMENTCODE2>
                            <PAYMENTCODE3></PAYMENTCODE3>
                            <PAYMENTCODE4></PAYMENTCODE4>
                            <PAYMENTCODE5></PAYMENTCODE5>
                            <PAYMENTCODE6></PAYMENTCODE6>
                            <PAYMENTCODE7></PAYMENTCODE7>
                            <PAYMENTCODE8></PAYMENTCODE8>
                            <PAYMENTCODE9></PAYMENTCODE9>
                            <PAYMENTCODE10></PAYMENTCODE10>
                            <BARCODEIMAGE>https://www.cuentadigital.com/barras.php?codigo=01909999237200</BARCODEIMAGE>
                            <BARCODEBASE64>R0lGODdh5gA0AIAAAAAAAP///ywAAAAA5gA0AAAC/oyPqcvtD6OctNqLs9Yg9G58gPgdpGeOJhqq
                            Ywmir5zGthrKLqufue/B9XibohEDW82Wyl3LxlvuoMwb9KkMJn8uIczr1RKP5LJjO2RyS9hfTcxO
                            R8NtWrUJ/FrxY7P/j3aiJlcXJxUIN3cl5na3xmgHRuX0V+mHeBiVWKiYOBlIB6lH8zjTKMkXY7lq
                            hNlluCna6Si3l8MpqJl5akvI+stBmkaZi/tGm9urXJsaludMCSxd4VrsayqcCYscij26/ZrlDR03
                            bR5RHWvtPTuV2nkrm9xMJUred56vkD647nzsrhS8gd90heP1RqC+hQv4EVP3DwsyTwkJMiv1b9wn
                            /nwM9TkEZyginIAXZRmbuCvSskEdO340GLKeRJLzOJ2kObKexnctW77cuBIgP4s3XyLEFa2nx2w5
                            YVrcg5Jmt4w4U45CWk5pvp885Qllym0Ru5rDdKJSqHUpSHUQZTZdG3NFUbAHVVa0lvYcV7Rjv8Il
                            6jVqniFYOeZltfeaSG1O48brKzjwWV+HpyX255YxUMCQq9a9Ki9p5V+X22aZOXTZXLhUV4oevap0
                            v8Xh/qqWbNRuYVWwEdNdZ9oN6t/ZpprNDXrs696AiPcLXpysdOPiPA9+tpk5aecPZ2eu3Zhza+7H
                            78bSbkk2MdrSKdrETb6666zoL8XP7nW4bfOr/huP311fbPd11Zd+4d3WGXKEhUZfgGSo51h07pXE
                            Tn9A/cegYQ5uAOFTfh3IH3yslQfghvaNGJ4xBm6G4HgoHpUhbya2MiBf7E04nVgu+kdijDOa0WFQ
                            K77TYnkv6ubjjw/WqNh37YUll4g8ymceS0pyyCRmp70F4nsJxgejcg1eSWaZZp6JZppqrslmm26+
                            CWecaGJjgYwIvKCKnXfueYaeS/JZxxgVtoEnCDtpgQOdvPlZySLUnBElA3oyGk9zN0RpqCZ3ipXA
                            NpEyBZY5i8plighP2HKFEPbU0IuGhy6nE6a6dIpPnvvQ+mmolfoGKDi3TKppsI4Cu2uvszbIk+lj
                            MNmK66d5jspnZpY1S8JDgj6nbLa74pmrs+LUKiurs2q7bbPGngsqMNAKky2z6T7rLhHJNkStHfSS
                            uyUslcoYL7ry5jutcEmlKrC+wQLKAhuhtKBsrMD2O+68/CKsKcSeigpGwoliemm1d00WRAoaP/tx
                            psVynNK+iXJbqMqlLtxyuXL6O3PNadFpc8467+xHAQA7
                            </BARCODEBASE64>
                            <INVOICEURL>https://www.CuentaDigital.com/verfactura.php?id=01909999237200</INVOICEURL>
                            <SITE>CuentaDigital.com</SITE>
                            <MERCHANTREFERENCE>4567892</MERCHANTREFERENCE>
                            <CONCEPT>Compra sitio web</CONCEPT>
                            <CURR>ARS</CURR>
                            <AMOUNT>2052</AMOUNT>
                            <DATE>07/08/2015</DATE>
                            <DUEDATE>14/08/2015</DUEDATE>
                            <EMAILTO></EMAILTO>
                            <COUNTRY></COUNTRY>
                            <LANG>es</LANG>
                            </INVOICE>
                            </REQUEST>'
            );

        $cupon = $cliente->getNuevoCupon();

        $cupon->setPrecio(20.52);
        $cupon->setVencimiento(7);
        $cupon->setCodigo('4567892');
        $cupon->setConcepto('Compra sitio web');

        $cuponResponse = $cliente->generarCupon($cupon);

        $this->assertEquals('4567892', $cuponResponse->getMerchantReference());

    }

    /**
     * @expectedException \Exception
     * @cover Cliente::generarCupon
     */
    public function testGenerarCuponError()
    {
        $cliente = $this->getMockBuilder('Am\CuentaDigital\Cliente')
            ->setMethods(array('_call'))
            ->setConstructorArgs(array(122556))
            ->getMock();

        $cliente->expects($this->any())
            ->method('_call')
            ->willReturn(
                '<center><img src="https://www.cuentadigital.com/images2/logo.gif"><br><br><b>Hay un error con el id de usuario, por favor contactese con el servicio administrativo</b><br><br><a href="https://www.cuentadigital.com">(c)CuentaDigital.com</a>'
            );

        $cupon = $cliente->getNuevoCupon();

        $cupon->setPrecio(20.52);
        $cupon->setVencimiento(7);
        $cupon->setCodigo('4567892');
        $cupon->setConcepto('Compra sitio web');

        $cliente->generarCupon($cupon);
    }

    /**
     * @cover Cliente::getReportePagos
     */
    public function testGetReportePagosCorrecto()
    {
        $cliente = $this->getMockBuilder('Am\CuentaDigital\Cliente')
            ->setMethods(array('_call'))
            ->setConstructorArgs(array(123456, '20bc02118c89999999f1eca71c282c47c', '9999999999'))
            ->getMock();

        $cliente->expects($this->any())
            ->method('_call')
            ->willReturn(
                '20150807|123633|100.000|93.660|6.340|01902770536778|00000000|PagoFacil|ffbc5a9bac0550fc6d6bb2563ffee74e-4f0ba2df72976c45cfecd90b14e3864d|1
                1|100.000|93.660|6.340|20150807|55e321960d6f729b12f3914dca346dbb'
            );

        // fecha solo
        $reporte = $cliente->getReportePagos('20150806');

        $this->assertEquals('100.000', $reporte->getMontoBruto());
        $this->assertEquals(1, count($reporte->getItems()));

        //fecha y hora
        $reporte = $cliente->getReportePagos('20150806', '00', '00', '14', '00');

        $this->assertEquals('100.000', $reporte->getMontoBruto());
        $this->assertEquals(1, count($reporte->getItems()));
    }

    /**
     * @expectedException \Exception
     * @cover Cliente::getReportePagos
     */
    public function testGetReportePagosErrorChecksum()
    {
        $cliente = $this->getMockBuilder('Am\CuentaDigital\Cliente')
            ->setMethods(array('_call'))
            ->setConstructorArgs(array(123456, '20bc02118c89999999f1eca71c282c47c', '9999999999'))
            ->getMock();

        $cliente->expects($this->any())
            ->method('_call')
            ->willReturn(
                '20150807|123633|100.000|93.660|6.340|01902770536778|00000000|PagoFacil|ffbc5a9bac0550fc6d6bb2563ffee74e-4f0ba2df72976c45cfecd90b14e3864d|1
                1|100.000|93.660|6.340|20150807|bcc3780eff266ad4d723038843a9a2fb'
            );

        $cliente->getReportePagos('20150806');

    }

    /**
     * @expectedException \Exception
     * @cover Cliente::getReportePagos
     */
    public function testGetReportePagosError()
    {
        $cliente = $this->getMockBuilder('Am\CuentaDigital\Cliente')
            ->setMethods(array('_call'))
            ->setConstructorArgs(array(123456, '20bc02118c89999999f1eca71c282c47c', '9999999999'))
            ->getMock();

        $cliente->expects($this->any())
            ->method('_call')
            ->willReturn(
                'Error: Hay un error en el pedido, aun no activo la herramienta, se encuentra mal configurada, su ip 190.193.219.177 no tiene permiso de exportar el archivo o el control es incorrecto.Chequee el area de exportacion dentro de su CuentaDigital y reconfigure las opciones.(La url puede haber cambiado si modifico sus opciones y debe usar la informada dentro de su cuenta.)'
            );

        $cliente->getReportePagos('20150806');
    }
}