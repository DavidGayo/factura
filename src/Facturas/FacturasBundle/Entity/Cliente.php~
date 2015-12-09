<?php

namespace Facturas\FacturasBundle\Entity;

/**
 * Cliente
 */
class Cliente
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
     * @var string
     */
    private $telefono;

    /**
     * @var string
     */
    private $alias;

    /**
     * @var string
     */
    private $email;


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
     * @return Cliente
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
     * @return Cliente
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
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Cliente
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return Cliente
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $direccionCliente;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contacto;

    /**
     * @var \Facturas\GeneralBundle\Entity\RegimenTributario
     */
    private $regimenTributario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->direccionCliente = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contacto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add direccionCliente
     *
     * @param \Facturas\FacturasBundle\Entity\DireccionCliente $direccionCliente
     *
     * @return Cliente
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
     * Add contacto
     *
     * @param \Facturas\FacturasBundle\Entity\Contacto $contacto
     *
     * @return Cliente
     */
    public function addContacto(\Facturas\FacturasBundle\Entity\Contacto $contacto)
    {
        $this->contacto[] = $contacto;

        return $this;
    }

    /**
     * Remove contacto
     *
     * @param \Facturas\FacturasBundle\Entity\Contacto $contacto
     */
    public function removeContacto(\Facturas\FacturasBundle\Entity\Contacto $contacto)
    {
        $this->contacto->removeElement($contacto);
    }

    /**
     * Get contacto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set regimenTributario
     *
     * @param \Facturas\GeneralBundle\Entity\RegimenTributario $regimenTributario
     *
     * @return Cliente
     */
    public function setRegimenTributario(\Facturas\GeneralBundle\Entity\RegimenTributario $regimenTributario = null)
    {
        $this->regimenTributario = $regimenTributario;

        return $this;
    }

    /**
     * Get regimenTributario
     *
     * @return \Facturas\GeneralBundle\Entity\RegimenTributario
     */
    public function getRegimenTributario()
    {
        return $this->regimenTributario;
    }

    public function __toString()
    {
        return $this->razonSocial;
    }
}
