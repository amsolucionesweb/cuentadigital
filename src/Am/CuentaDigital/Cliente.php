<?php

namespace Am\CuentaDigital;

use Am\CuentaDigital\Cupon;
use Am\CuentaDigital\CuponResponse;
use Am\CuentaDigital\Reporte;
use Am\CuentaDigital\ReporteItem;

/**
 * Se encarga de interactuar con el webservice de Cuenta Digital
 *
 * @author Andrés Michel <dev@amsolucionesweb.com.ar>
 */
class Cliente
{
    /**
     * URL para generar los cupones
     */
    const URL_GENERACION_CUPON = 'https://www.cuentadigital.com/api.php';

    /**
     * URL para hacer pruebas de exportación
     */
    const URL_EXP_DESARROLLO = 'https://www.cuentadigital.com/exportacionsandbox.php';

    /**
     * URL para recibir los pagos reales
     */
    const URL_EXP_PRODUCCION = 'https://www.cuentadigital.com/exportacion.php';

    /**
     * Id de cuenta digital necesario para generar cupones.
     *
     * @var integer
     */
    private $idCuentaDigital;

    /**
     * Hasg de control necesario para realizar la exportación.
     *
     * @var string
     */
    private $hashControl;

    /**
     * Clave para validar que el reporte es valido.
     *
     * @var string
     */
    private $claveSeguridad;

    /**
     * Indica si se va a trabajar con la url de desarrollo o la de producción.
     *
     * @var boolean
     */
    private $modoDesarrollo;

    /**
     * Tiempo en milisegundos a esperar que responda el api. Defecto 0 espera
     * indefinidamente
     *
     * @var integer
     */
    private $curlTimeout;

    /**
     * Crea una instancia del cliente
     *
     * @param integer $idCuentaDigital
     * @param string $hashControl
     * @param string $claveSeguridad
     * @param boolean $modoDesarrollo
     */
    public function __construct($idCuentaDigital, $hashControl = null, $claveSeguridad = null, $modoDesarrollo = false)
    {
        $this->idCuentaDigital = $idCuentaDigital;
        $this->hashControl = $hashControl;
        $this->claveSeguridad = $claveSeguridad;
        $this->modoDesarrollo = $modoDesarrollo;
        $this->curlTimeout = 0;
    }

    /**
     * Set curlTimeout
     *
     * @param integer $curlTimeout
     *
     * @return \Am\CuentaDigital\Cliente
     */
    public function setCurlTimeout($curlTimeout)
    {
        $this->curlTimeout = $curlTimeout;

        return $this;
    }

    /**
     * Crea un cupón vacío con el id de cuenta digital seteado listo para cargar
     * los demás datos.
     *
     * @return Cupon
     */
    public function getNuevoCupon()
    {
        $cupon = new Cupon();
        $cupon->setId($this->idCuentaDigital);

        return $cupon;
    }

    /**
     * Crea los parámetros de URL y hace la llamada al webservice.
     *
     * @param \AM\CuentaDigital\Cupon $cupon
     *
     * @return CuponResponse
     *
     * @throws \Exception
     */
    public function generarCupon(Cupon $cupon)
    {
        // armo la url para generar el cupon
        $parametros = '?';

        if ($cupon->getId() && is_int($cupon->getId())) {
            $parametros .= 'id='.$cupon->getId();
        } else {
            throw new \Exception("Parametro: ID cuenta digital no especificado.");
        }

        if ($cupon->getPrecio()) {
            $parametros .= '&precio='.number_format($cupon->getPrecio(), 2);
        } else {
            throw new \Exception("Parametro: precio no especificado.");
        }

        if ($cupon->getVencimiento()) {
            $parametros .= '&venc='.$cupon->getVencimiento();
        } else {
            throw new \Exception("Parametro: vencimiento no especificado.");
        }

        if ($cupon->getCodigo()) {
            $parametros .= '&codigo='.$cupon->getCodigo();
        }

        if ($cupon->getHacia()) {
            $parametros .= '&hacia='.$cupon->getHacia();
        }

        if ($cupon->getConcepto()) {
            $parametros .= '&concepto='.urlencode($cupon->getConcepto());
        }

        if ($cupon->getMoneda()) {
            $parametros .= '&moneda='.$cupon->getMoneda();
        }

        if ($cupon->getHash()) {
            $parametros .= '&hash='.$cupon->getHash();
        }

        if ($cupon->getPrecio2()) {
            $parametros .= '&precio2='.number_format($cupon->getPrecio2(), 2);
        }

        if ($cupon->getVencimiento2()) {
            $parametros .= '&venc2='.$cupon->getVencimiento2();
        }

        if ($cupon->getM0()) {
            $parametros .= '&m0='.$cupon->getM0();
        }

        if ($cupon->getM1()) {
            $parametros .= '&m1='.$cupon->getM1();
        }

        if ($cupon->getM2()) {
            $parametros .= '&m2='.$cupon->getM2();
        }

        $parametros .= '&xml=1';

        $respuesta = $this->_call(self::URL_GENERACION_CUPON.$parametros);

        $xml = @simplexml_load_string($respuesta);

        // hubo un error en el parseo por un error al generar el cupón
        if (!$xml) {
            throw new \Exception(strip_tags($respuesta));
        }

        return new CuponResponse($xml);
    }

    /**
     * Retorna un reporte de pagos
     *
     * @param $fecha de la operación en formato YYYYMMDD
     * @param string $hora1 de inicio en formato 01
     * @param string $min1 de inicio en formato 01
     * @param string $hora2 de fin en formato 01
     * @param string $min2 de fin en formato 01
     *
     * @return Reporte
     *
     * @throws \Exception
     */
    public function getReportePagos($fecha, $hora1 = null, $min1 = null, $hora2 = null, $min2 = null)
    {
        $parametros = '?control='.$this->hashControl;
        $parametros .= '&fecha='.$fecha;

        if ($hora1 !== null && $min1 !== null && $hora2 !== null && $min2 !== null) {
            $parametros .= '&hour1='.$hora1.'&min1='.$min1.'&hour2='.$hora2.'&min2='.$min2;
        }

        $url = self::URL_EXP_PRODUCCION.$parametros;
        if ($this->modoDesarrollo) {
            $url = self::URL_EXP_DESARROLLO.$parametros;
        }

        $respuesta = $this->_call($url);

        if (!strpos($respuesta, '|')) {
            throw new \Exception(strip_tags($respuesta));
        }

        $lineas = explode("\n", $respuesta);

        $resumen = explode('|', array_pop($lineas));

        $reporte = new Reporte();
        $reporte->setCantidadCobros($resumen[0]);
        $reporte->setMontoBruto($resumen[1]);
        $reporte->setMontoNeto($resumen[2]);
        $reporte->setComision($resumen[3]);
        $reporte->setFechaCobro(
            \DateTime::createFromFormat('Ymd', $resumen[4], new \DateTimeZone('America/Argentina/Buenos_Aires'))
        );
        $reporte->setChecksum($resumen[5]);

        // detecto que el reporte se correcto sino informo error
        if ($resumen[5] != md5($resumen[4].$this->claveSeguridad)) {
            throw new \Exception("El checksum del reporte no es valido.");
        }

        foreach ($lineas as $linea) {
            $data = explode('|', $linea);

            $item = new ReporteItem();
            $item->setFecha(
                \DateTime::createFromFormat(
                    'YmdHis',
                    $data[0].$data[1],
                    new \DateTimeZone('America/Argentina/Buenos_Aires')
                )
            );
            $item->setMontoBruto($data[2]);
            $item->setMontoNeto($data[3]);
            $item->setComision($data[4]);
            $item->setCodigoBarra($data[5]);
            $item->setReferencia($data[6]);
            $item->setReferencia($data[6]);
            $item->setMedioPago($data[7]);
            $item->setCobroNumero($data[8]);

            $reporte->addItem($item);
        }

        return $reporte;
    }

    /**
     * Hace una llamada al webservice
     *
     * @param string $url
     *
     * @return string
     *
     * @throws \Exception
     */
    public function _call($url)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($this->curlTimeout) {
            curl_setopt($ch, CURLOPT_TIMEOUT_MS, $this->curlTimeout);
        }

        $output = curl_exec($ch);

        if ($output === false) {
            throw new \Exception(curl_error($ch));
        }

        curl_close($ch);

        return $output;
    }

}

