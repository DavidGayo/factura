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
    private $calle;

    /**
     * @var string
     */
    private $numeroExt;

    /**
     * @var string
     */
    private $numeroInt;

    /**
     * @var string
     */
    private $colonia;

    /**
     * @var string
     */
    private $rfc;

    /**
     * @var integer
     */
    private $codigoPostal;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var string
     */
    private $localidad;

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
     * Set calle
     *
     * @param string $calle
     *
     * @return Cliente
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set numeroExt
     *
     * @param string $numeroExt
     *
     * @return Cliente
     */
    public function setNumeroExt($numeroExt)
    {
        $this->numeroExt = $numeroExt;

        return $this;
    }

    /**
     * Get numeroExt
     *
     * @return string
     */
    public function getNumeroExt()
    {
        return $this->numeroExt;
    }

    /**
     * Set numeroInt
     *
     * @param string $numeroInt
     *
     * @return Cliente
     */
    public function setNumeroInt($numeroInt)
    {
        $this->numeroInt = $numeroInt;

        return $this;
    }

    /**
     * Get numeroInt
     *
     * @return string
     */
    public function getNumeroInt()
    {
        return $this->numeroInt;
    }

    /**
     * Set colonia
     *
     * @param string $colonia
     *
     * @return Cliente
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get colonia
     *
     * @return string
     */
    public function getColonia()
    {
        return $this->colonia;
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
     * Set codigoPostal
     *
     * @param integer $codigoPostal
     *
     * @return Cliente
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return integer
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
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
     * Set localidad
     *
     * @param string $localidad
     *
     * @return Cliente
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string
     */
    public function getLocalidad()
    {
        return $this->localidad;
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
     * @var \Facturas\GeneralBundle\Entity\Moneda
     */
    private $tipoMoneda;

    /**
     * @var \Facturas\GeneralBundle\Entity\Pais
     */
    private $pais;

    /**
     * @var \Facturas\GeneralBundle\Entity\Estado
     */
    private $estado;

    /**
     * @var \Facturas\GeneralBundle\Entity\Municipio
     */
    private $municipio;

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

    /**
     * Set tipoMoneda
     *
     * @param \Facturas\GeneralBundle\Entity\Moneda $tipoMoneda
     *
     * @return Cliente
     */
    public function setTipoMoneda(\Facturas\GeneralBundle\Entity\Moneda $tipoMoneda = null)
    {
        $this->tipoMoneda = $tipoMoneda;

        return $this;
    }

    /**
     * Get tipoMoneda
     *
     * @return \Facturas\GeneralBundle\Entity\Moneda
     */
    public function getTipoMoneda()
    {
        return $this->tipoMoneda;
    }

    /**
     * Set pais
     *
     * @param \Facturas\GeneralBundle\Entity\Pais $pais
     *
     * @return Cliente
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

    /**
     * Set estado
     *
     * @param \Facturas\GeneralBundle\Entity\Estado $estado
     *
     * @return Cliente
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
     * Set municipio
     *
     * @param \Facturas\GeneralBundle\Entity\Municipio $municipio
     *
     * @return Cliente
     */
    public function setMunicipio(\Facturas\GeneralBundle\Entity\Municipio $municipio = null)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return \Facturas\GeneralBundle\Entity\Municipio
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }
}
