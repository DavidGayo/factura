<?php

namespace Facturas\GeneralBundle\Entity;

/**
 * RegimenTributario
 */
class RegimenTributario
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $regimenTributario;


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
     * Set regimenTributario
     *
     * @param string $regimenTributario
     *
     * @return RegimenTributario
     */
    public function setRegimenTributario($regimenTributario)
    {
        $this->regimenTributario = $regimenTributario;

        return $this;
    }

    /**
     * Get regimenTributario
     *
     * @return string
     */
    public function getRegimenTributario()
    {
        return $this->regimenTributario;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cliente;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cliente = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cliente
     *
     * @param \Facturas\FacturasBundle\Entity\Cliente $cliente
     *
     * @return RegimenTributario
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

    public function __toString()
    {
        return $this->regimenTributario;
    }
}
