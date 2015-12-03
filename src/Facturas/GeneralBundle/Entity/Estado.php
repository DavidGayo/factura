<?php

namespace Facturas\GeneralBundle\Entity;

/**
 * Estado
 */
class Estado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $estado;


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
     * Set estado
     *
     * @param string $estado
     *
     * @return Estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $municipio;

    /**
     * @var \Facturas\GeneralBundle\Entity\Pais
     */
    private $pais;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cliente = new \Doctrine\Common\Collections\ArrayCollection();
        $this->direccionCliente = new \Doctrine\Common\Collections\ArrayCollection();
        $this->municipio = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cliente
     *
     * @param \Facturas\FacturasBundle\Entity\Cliente $cliente
     *
     * @return Estado
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
     * @param \Facturas\FacturasBundle\Entity\DireccionCliente $direccionCliente
     *
     * @return Estado
     */
    public function addDireccionCliente(\Facturas\FacturasBundle\Entity\DireccionCliente $direccionCliente)
    {
        $this->direccionCliente[] = $direccionCliente;

        return $this;
    }

    /**
     * Remove direccionCliente
     *
     * @param \Facturas\FacturasBundle\Entity\DireccionCliente $direccionCliente
     */
    public function removeDireccionCliente(\Facturas\FacturasBundle\Entity\DireccionCliente $direccionCliente)
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
     * Add municipio
     *
     * @param \Facturas\GeneralBundle\Entity\Municipio $municipio
     *
     * @return Estado
     */
    public function addMunicipio(\Facturas\GeneralBundle\Entity\Municipio $municipio)
    {
        $this->municipio[] = $municipio;

        return $this;
    }

    /**
     * Remove municipio
     *
     * @param \Facturas\GeneralBundle\Entity\Municipio $municipio
     */
    public function removeMunicipio(\Facturas\GeneralBundle\Entity\Municipio $municipio)
    {
        $this->municipio->removeElement($municipio);
    }

    /**
     * Get municipio
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set pais
     *
     * @param \Facturas\GeneralBundle\Entity\Pais $pais
     *
     * @return Estado
     */
    public function setPais(\Facturas\GeneralBundle\Entity\Pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \Facturas\GeneralBundle\Entity\Pais
     */
    public function getPais()
    {
        return $this->pais;
    }
}
