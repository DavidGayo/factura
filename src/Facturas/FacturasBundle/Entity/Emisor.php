<?php

namespace Facturas\FacturasBundle\Entity;

/**
 * Emisor
 */
class Emisor
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $razonSocial;

    /**
     * @var string
     */
    private $rfc;


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
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Emisor
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set rfc
     *
     * @param string $rfc
     *
     * @return Emisor
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get rfc
     *
     * @return string
     */
    public function getRfc()
    {
        return $this->rfc;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $direccionEmisor;

    /**
     * @var \Facturas\GeneralBundle\Entity\Contribuyente
     */
    private $tipoContribuyente;

    /**
     * @var \Facturas\GeneralBundle\Entity\Giro
     */
    private $giro;

    /**
     * @var \Facturas\GeneralBundle\Entity\RegimenFiscal
     */
    private $regimenFiscal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->direccionEmisor = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add direccionEmisor
     *
     * @param \Facturas\FacturasBundle\Entity\DireccionEmisor $direccionEmisor
     *
     * @return Emisor
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

    /**
     * Set tipoContribuyente
     *
     * @param \Facturas\GeneralBundle\Entity\Contribuyente $tipoContribuyente
     *
     * @return Emisor
     */
    public function setTipoContribuyente(\Facturas\GeneralBundle\Entity\Contribuyente $tipoContribuyente = null)
    {
        $this->tipoContribuyente = $tipoContribuyente;

        return $this;
    }

    /**
     * Get tipoContribuyente
     *
     * @return \Facturas\GeneralBundle\Entity\Contribuyente
     */
    public function getTipoContribuyente()
    {
        return $this->tipoContribuyente;
    }

    /**
     * Set giro
     *
     * @param \Facturas\GeneralBundle\Entity\Giro $giro
     *
     * @return Emisor
     */
    public function setGiro(\Facturas\GeneralBundle\Entity\Giro $giro = null)
    {
        $this->giro = $giro;

        return $this;
    }

    /**
     * Get giro
     *
     * @return \Facturas\GeneralBundle\Entity\Giro
     */
    public function getGiro()
    {
        return $this->giro;
    }

    /**
     * Set regimenFiscal
     *
     * @param \Facturas\GeneralBundle\Entity\RegimenFiscal $regimenFiscal
     *
     * @return Emisor
     */
    public function setRegimenFiscal(\Facturas\GeneralBundle\Entity\RegimenFiscal $regimenFiscal = null)
    {
        $this->regimenFiscal = $regimenFiscal;

        return $this;
    }

    /**
     * Get regimenFiscal
     *
     * @return \Facturas\GeneralBundle\Entity\RegimenFiscal
     */
    public function getRegimenFiscal()
    {
        return $this->regimenFiscal;
    }

    
}
