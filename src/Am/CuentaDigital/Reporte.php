<?php

namespace Am\CuentaDigital;

/**
 * Reporte de operaciones
 *
 * @author Andrés Michel <dev@amsolucionesweb.com.ar>
 */
class Reporte
{
    /**
     * @var int
     */
    private $cantidadCobros;

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
     * @var \DateTime
     */
    private $fechaCobro;

    /**
     * @var string
     */
    private $checksum;

    /**
     * @var ReporteItem[]
     */
    private $items;

    /**
     * @return int
     */
    public function getCantidadCobros()
    {
        return $this->cantidadCobros;
    }

    /**
     * @param int $cantidadCobros
     */
    public function setCantidadCobros($cantidadCobros)
    {
        $this->cantidadCobros = $cantidadCobros;
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
     * @return \DateTime
     */
    public function getFechaCobro()
    {
        return $this->fechaCobro;
    }

    /**
     * @param \DateTime $fechaCobro
     */
    public function setFechaCobro($fechaCobro)
    {
        $this->fechaCobro = $fechaCobro;
    }

    /**
     * @return string
     */
    public function getChecksum()
    {
        return $this->checksum;
    }

    /**
     * @param string $checksum
     */
    public function setChecksum($checksum)
    {
        $this->checksum = $checksum;
    }

    /**
     * @return ReporteItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param ReporteItem[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @param ReporteItem $item
     */
    public function addItem($item)
    {
        $this->items[] = $item;
    }
}