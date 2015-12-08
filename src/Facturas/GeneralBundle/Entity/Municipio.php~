<?php

namespace Facturas\GeneralBundle\Entity;

/**
 * Municipio
 */
class Municipio
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $municipio;


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
     * Set municipio
     *
     * @param string $municipio
     *
     * @return Municipio
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cliente;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $direccionCliente;

    /**
     * @var \Facturas\GeneralBundle\Entity\Estado
     */
    private $estado;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cliente = new \Doctrine\Common\Collections\ArrayCollection();
        $this->direccionCliente = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cliente
     *
     * @param \Facturas\FacturasBundle\Entity\Cliente $cliente
     *
     * @return Municipio
     */
    public function addCliente(\Facturas\FacturasBundle\Entity\Cliente $cliente)
    {
        $this->cliente[] = $cliente;

        return $this;
    }

    /**
     * Remove cliente
     *
     * @param \Facturas\FacturasBundle\Entity\Cliente $cliente
     */
    public function removeCliente(\Facturas\FacturasBundle\Entity\Cliente $cliente)
    {
        $this->cliente->removeElement($cliente);
    }

    /**
     * Get cliente
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Add direccionCliente
     *
     * @param \Facturas\GeneralBundle\Entity\Municipio $direccionCliente
     *
     * @return Municipio
     */
    public function addDireccionCliente(\Facturas\GeneralBundle\Entity\Municipio $direccionCliente)
    {
        $this->direccionCliente[] = $direccionCliente;

        return $this;
    }

    /**
     * Remove direccionCliente
     *
     * @param \Facturas\GeneralBundle\Entity\Municipio $direccionCliente
     */
    public function removeDireccionCliente(\Facturas\GeneralBundle\Entity\Municipio $direccionCliente)
    {
        $this->direccionCliente->removeElement($direccionCliente);
    }

    /**
     * Get direccionCliente
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDireccionCliente()
    {
        return $this->direccionCliente;
    }

    /**
     * Set estado
     *
     * @param \Facturas\GeneralBundle\Entity\Estado $estado
     *
     * @return Municipio
     */
    public function setEstado(\Facturas\GeneralBundle\Entity\Estado $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \Facturas\GeneralBundle\Entity\Estado
     */
    public function getEstado()
    {
        return $this->estado;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $direccionEmisor;


    /**
     * Add direccionEmisor
     *
     * @param \Facturas\FacturasBundle\Entity\DireccionEmisor $direccionEmisor
     *
     * @return Municipio
     */
    public function addDireccionEmisor(\Facturas\FacturasBundle\Entity\DireccionEmisor $direccionEmisor)
    {
        $this->direccionEmisor[] = $direccionEmisor;

        return $this;
    }

    /**
     * Remove direccionEmisor
     *
     * @param \Facturas\FacturasBundle\Entity\DireccionEmisor $direccionEmisor
     */
    public function removeDireccionEmisor(\Facturas\FacturasBundle\Entity\DireccionEmisor $direccionEmisor)
    {
        $this->direccionEmisor->removeElement($direccionEmisor);
    }

    /**
     * Get direccionEmisor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDireccionEmisor()
    {
        return $this->direccionEmisor;
    }

    public function __toString()
    {
        return $this->municipio;
    }
}
