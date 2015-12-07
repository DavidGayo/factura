<?php

namespace Facturas\GeneralBundle\Entity;

/**
 * Giro
 */
class Giro
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $giro;


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
     * Set giro
     *
     * @param string $giro
     *
     * @return Giro
     */
    public function setGiro($giro)
    {
        $this->giro = $giro;

        return $this;
    }

    /**
     * Get giro
     *
     * @return string
     */
    public function getGiro()
    {
        return $this->giro;
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
     * @return Giro
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

    public function __toString()
    {
        return $this->giro;
    }
}
