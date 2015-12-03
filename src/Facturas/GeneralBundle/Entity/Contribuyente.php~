<?php

namespace Facturas\GeneralBundle\Entity;

/**
 * Contribuyente
 */
class Contribuyente
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tipoContribuyente;


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
     * Set tipoContribuyente
     *
     * @param string $tipoContribuyente
     *
     * @return Contribuyente
     */
    public function setTipoContribuyente($tipoContribuyente)
    {
        $this->tipoContribuyente = $tipoContribuyente;

        return $this;
    }

    /**
     * Get tipoContribuyente
     *
     * @return string
     */
    public function getTipoContribuyente()
    {
        return $this->tipoContribuyente;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $emisor;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emisor = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add emisor
     *
     * @param \Facturas\FacturasBundle\Entity\Emisor $emisor
     *
     * @return Contribuyente
     */
    public function addEmisor(\Facturas\FacturasBundle\Entity\Emisor $emisor)
    {
        $this->emisor[] = $emisor;

        return $this;
    }

    /**
     * Remove emisor
     *
     * @param \Facturas\FacturasBundle\Entity\Emisor $emisor
     */
    public function removeEmisor(\Facturas\FacturasBundle\Entity\Emisor $emisor)
    {
        $this->emisor->removeElement($emisor);
    }

    /**
     * Get emisor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmisor()
    {
        return $this->emisor;
    }
}
