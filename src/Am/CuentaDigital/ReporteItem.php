<?php

namespace Am\CuentaDigital;

/**
 * Item de un reporte de operaciones
 *
 * @author Andrés Michel <dev@amsolucionesweb.com.ar>
 */
class ReporteItem
{
    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var float
     */
    private $montoBruto;

    /**
     * @var float
     */
    private $montoNeto;

    /**
     * @var float
     */
    private $comision;

    /**
     * @var string
     */
    private $codigoBarra;

    /**
     * @var string
     */
    private $referencia;

    /**
     * @var string
     */
    private $medioPago;

    /**
     * @var int
     */
    private $cobroNumero;

    /**
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param \DateTime $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return float
     */
    public function getMontoBruto()
    {
        return $this->montoBruto;
    }

    /**
     * @param float $montoBruto
     */
    public function setMontoBruto($montoBruto)
    {
        $this->montoBruto = $montoBruto;
    }

    /**
     * @return float
     */
    public function getMontoNeto()
    {
        return $this->montoNeto;
    }

    /**
     * @param float $montoNeto
     */
    public function setMontoNeto($montoNeto)
    {
        $this->montoNeto = $montoNeto;
    }

    /**
     * @return float
     */
    public function getComision()
    {
        return $this->comision;
    }

    /**
     * @param float $comision
     */
    public function setComision($comision)
    {
        $this->comision = $comision;
    }

    /**
     * @return string
     */
    public function getCodigoBarra()
    {
        return $this->codigoBarra;
    }

    /**
     * @param string $codigoBarra
     */
    public function setCodigoBarra($codigoBarra)
    {
        $this->codigoBarra = $codigoBarra;
    }

    /**
     * @return string
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @param string $referencia
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }

    /**
     * @return string
     */
    public function getMedioPago()
    {
        return $this->medioPago;
    }

    /**
     * @param string $medioPago
     */
    public function setMedioPago($medioPago)
    {
        $this->medioPago = $medioPago;
    }

    /**
     * @return int
     */
    public function getCobroNumero()
    {
        return $this->cobroNumero;
    }

    /**
     * @param int $cobroNumero
     */
    public function setCobroNumero($cobroNumero)
    {
        $this->cobroNumero = $cobroNumero;
    }
}