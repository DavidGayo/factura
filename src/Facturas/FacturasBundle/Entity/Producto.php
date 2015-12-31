<?php

namespace Facturas\FacturasBundle\Entity;

/**
 * Producto
 */
class Producto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoBarras;

    /**
     * @var string
     */
    private $clave;

    /**
     * @var string
     */
    private $marca;

    /**
     * @var string
     */
    private $unidadMedida;

    /**
     * @var integer
     */
    private $precioUnitarioMxn;

    /**
     * @var integer
     */
    private $precioUnitarioUsd;

    /**
     * @var string
     */
    private $modelo;

    /**
     * @var string
     */
    private $descripcion;


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
     * Set codigoBarras
     *
     * @param string $codigoBarras
     *
     * @return Producto
     */
    public function setCodigoBarras($codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;

        return $this;
    }

    /**
     * Get codigoBarras
     *
     * @return string
     */
    public function getCodigoBarras()
    {
        return $this->codigoBarras;
    }

    /**
     * Set clave
     *
     * @param string $clave
     *
     * @return Producto
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Producto
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set unidadMedida
     *
     * @param string $unidadMedida
     *
     * @return Producto
     */
    public function setUnidadMedida($unidadMedida)
    {
        $this->unidadMedida = $unidadMedida;

        return $this;
    }

    /**
     * Get unidadMedida
     *
     * @return string
     */
    public function getUnidadMedida()
    {
        return $this->unidadMedida;
    }

    /**
     * Set precioUnitarioMxn
     *
     * @param integer $precioUnitarioMxn
     *
     * @return Producto
     */
    public function setPrecioUnitarioMxn($precioUnitarioMxn)
    {
        $this->precioUnitarioMxn = $precioUnitarioMxn;

        return $this;
    }

    /**
     * Get precioUnitarioMxn
     *
     * @return integer
     */
    public function getPrecioUnitarioMxn()
    {
        return $this->precioUnitarioMxn;
    }

     /**
     * Set precioUnitarioUsd
     *
     * @param integer $precioUnitarioUsd
     *
     * @return Producto
     */
    public function setPrecioUnitarioUsd($precioUnitarioUsd)
    {
        $this->precioUnitarioUsd = $precioUnitarioUsd;

        return $this;
    }

    /**
     * Get precioUnitarioUsd
     *
     * @return integer
     */
    public function getPrecioUnitarioUsd()
    {
        return $this->precioUnitarioUsd;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Producto
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    /**
     * @var \Facturas\GeneralBundle\Entity\TipoProducto
     */
    private $tipoProducto;


    /**
     * Set tipoProducto
     *
     * @param \Facturas\GeneralBundle\Entity\TipoProducto $tipoProducto
     *
     * @return Producto
     */
    public function setTipoProducto(\Facturas\GeneralBundle\Entity\TipoProducto $tipoProducto = null)
    {
        $this->tipoProducto = $tipoProducto;

        return $this;
    }

    /**
     * Get tipoProducto
     *
     * @return \Facturas\GeneralBundle\Entity\TipoProducto
     */
    public function getTipoProducto()
    {
        return $this->tipoProducto;
    }
}
