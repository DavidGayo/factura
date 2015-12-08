<?php

namespace Facturas\GeneralBundle\Entity;

/**
 * Pais
 */
class Pais
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $pais;


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
     * Set pais
     *
     * @param string $pais
     *
     * @return Pais
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
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
    private $estado;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cliente = new \Doctrine\Common\Collections\ArrayCollection();
        $this->direccionCliente = new \Doctrine\Common\Collections\ArrayCollection();
        $this->estado = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cliente
     *
     * @param \Facturas\FacturasBundle\Entity\Cliente $cliente
     *
     * @return Pais
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
     * @return Pais
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
     * Add estado
     *
     * @param \Facturas\GeneralBundle\Entity\Estado $estado
     *
     * @return Pais
     */
    public function addEstado(\Facturas\GeneralBundle\Entity\Estado $estado)
    {
        $this->estado[] = $estado;

        return $this;
    }

    /**
     * Remove estado
     *
     * @param \Facturas\GeneralBundle\Entity\Estado $estado
     */
    public function removeEstado(\Facturas\GeneralBundle\Entity\Estado $estado)
    {
        $this->estado->removeElement($estado);
    }

    /**
     * Get estado
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstado()
    {
        return $this->estado;
    }

    public function __toString()
    {
        return $this->pais;
    }
}
