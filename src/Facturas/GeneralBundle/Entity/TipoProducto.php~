<?php

namespace Facturas\GeneralBundle\Entity;

/**
 * TipoProducto
 */
class TipoProducto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tipoProducto;


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
     * Set tipoProducto
     *
     * @param string $tipoProducto
     *
     * @return TipoProducto
     */
    public function setTipoProducto($tipoProducto)
    {
        $this->tipoProducto = $tipoProducto;

        return $this;
    }

    /**
     * Get tipoProducto
     *
     * @return string
     */
    public function getTipoProducto()
    {
        return $this->tipoProducto;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $producto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->producto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add producto
     *
     * @param \Facturas\FacturasBundle\Entity\Producto $producto
     *
     * @return TipoProducto
     */
    public function addProducto(\Facturas\FacturasBundle\Entity\Producto $producto)
    {
        $this->producto[] = $producto;

        return $this;
    }

    /**
     * Remove producto
     *
     * @param \Facturas\FacturasBundle\Entity\Producto $producto
     */
    public function removeProducto(\Facturas\FacturasBundle\Entity\Producto $producto)
    {
        $this->producto->removeElement($producto);
    }

    /**
     * Get producto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducto()
    {
        return $this->producto;
    }
}
