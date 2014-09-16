<?php

namespace Am\CuentaDigital;

/**
 * Cupón de pago a generar a través del API
 *
 * @author Andrés Michel <dev@amsolucionesweb.com.ar>
 */
class Cupon
{

    /**
     * Su número de CuentaDigital
     *
     * @var int
     */
    private $id;

    /**
     * El monto a cobrar (Debe de incluir 2 cifras adicionales que indicaran
     * los centavos)
     *
     * @var float
     */
    private $precio;

    /**
     * Días desde la fecha actual hasta el vencimiento del cupón
     *
     * @var integer
     */
    private $vencimiento;

    /**
     * Código para referencia del pago para integración con sus sistemas,
     * referencia del vendedor. (La referencia no puede superar el máximo de 50
     * caracteres alfanuméricos)
     *
     * @var string
     */
    private $codigo;

    /**
     * Envío del cupón hacia el email ingresado
     *
     * @var string
     */
    private $hacia;

    /**
     * Concepto de la venta que aparecerá en el cupón
     *
     * @var string
     */
    private $concepto;

    /**
     * La moneda base en código ISO en mayúsculas en la cual el sistema se
     * basara para calcular el precio correcto, dejándolo vacío la base es
     * ARS (Pesos Argentinos), ejemplos: ARS, CLP, RBL, MXN, USD, EUR
     *
     * @var string
     */
    private $moneda;

    /**
     * Hash opcional para control de generación de cupones
     *
     * @var string
     */
    private $hash;

    /**
     * El segundo monto a cobrar luego del primer vencimiento (Debe de incluir
     * 2 cifras adicionales que indicaran los centavos)
     *
     * @var float
     */
    private $precio2;

    /**
     * Cantidad de días al segundo vencimiento
     *
     * @var integer
     */
    private $vencimiento2;

    /**
     * Valor "1" habilita todos los medios disponibles, default "0" o sin usar
     * para deshabilitar. Necesario cuenta es nivel 3.
     *
     * @var integer
     */
    private $m0 = 0;

    /**
     * Valor "1" habilita LinkPagos, default "0" o sin usar para deshabilitar.
     * Necesario cuenta es nivel 3.
     *
     * @var integer
     */
    private $m1 = 0;

    /**
     * Valor "1" habilita Tarjetas de Crédito, default "0" o sin usar para
     * deshabilitar. Necesario cuenta es nivel 3.
     *
     * @var integer
     */
    private $m2 = 0;

    /**
     * La generación de sus cupones recibirá la respuesta en XML en lugar de
     * mostrar el cupón original.
     *
     * @var integer
     */
    private $xml;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get vencimiento
     *
     * @return integer
     */
    public function getVencimiento()
    {
        return $this->vencimiento;
    }

    /**
     * Set vencimiento
     *
     * @param integer $vencimiento
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setVencimiento($vencimiento)
    {
        $this->vencimiento = $vencimiento;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get hacia
     *
     * @return string
     */
    public function getHacia()
    {
        return $this->hacia;
    }

    /**
     * Set hacia
     *
     * @param string $hacia
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setHacia($hacia)
    {
        $this->hacia = $hacia;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get moneda
     *
     * @return string
     */
    public function getMoneda()
    {
        return $this->moneda;
    }

    /**
     * Set moneda
     *
     * @param string $moneda
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set hash
     *
     * @param string $hash
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get precio2
     *
     * @return float
     */
    public function getPrecio2()
    {
        return $this->precio2;
    }

    /**
     * Set precio2
     *
     * @param float $precio2
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setPrecio2($precio2)
    {
        $this->precio2 = $precio2;

        return $this;
    }

    /**
     * Get vencimiento2
     *
     * @return integer
     */
    public function getVencimiento2()
    {
        return $this->vencimiento2;
    }

    /**
     * Set vencimiento2
     *
     * @param integer $vencimiento2
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setVencimiento2($vencimiento2)
    {
        $this->vencimiento2 = $vencimiento2;

        return $this;
    }

    /**
     * Get m0
     *
     * @return integer
     */
    public function getM0()
    {
        return $this->m0;
    }

    /**
     * Set m0
     *
     * @param integer $m0
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setM0($m0)
    {
        $this->m0 = $m0;

        return $this;
    }

    /**
     * Get m1
     *
     * @return integer
     */
    public function getM1()
    {
        return $this->m1;
    }

    /**
     * Set m1
     *
     * @param integer $m1
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setM1($m1)
    {
        $this->m1 = $m1;

        return $this;
    }

    /**
     * Get m2
     *
     * @return integer
     */
    public function getM2()
    {
        return $this->m2;
    }

    /**
     * Set m2
     *
     * @param integer $m2
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setM2($m2)
    {
        $this->m2 = $m2;

        return $this;
    }

    /**
     * Get xml
     *
     * @return integer
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * Set xml
     *
     * @param integer $xml
     *
     * @return \AM\CuentaDigital\Cupon
     */
    public function setXml($xml)
    {
        $this->xml = $xml;

        return $this;
    }

}
