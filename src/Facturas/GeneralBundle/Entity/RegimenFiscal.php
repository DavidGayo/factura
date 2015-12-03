<?php

namespace Facturas\GeneralBundle\Entity;

/**
 * RegimenFiscal
 */
class RegimenFiscal
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $regimenFiscal;


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
     * Set regimenFiscal
     *
     * @param string $regimenFiscal
     *
     * @return RegimenFiscal
     */
    public function setRegimenFiscal($regimenFiscal)
    {
        $this->regimenFiscal = $regimenFiscal;

        return $this;
    }

    /**
     * Get regimenFiscal
     *
     * @return string
     */
    public function getRegimenFiscal()
    {
        return $this->regimenFiscal;
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
     * @return RegimenFiscal
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
