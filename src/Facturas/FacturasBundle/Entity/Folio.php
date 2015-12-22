<?php

namespace Facturas\FacturasBundle\Entity;

/**
 * Folio
 */
class Folio
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $serie;

    /**
     * @var string
     */
    private $folioInicial;

    /**
     * @var string
     */
    private $folioFinal;

    /**
     * @var string
     */
    private $tipoDocumento;

    /**
     * @var string
     */
    private $lugarExpedicion;

    /**
     * @var integer
     */
    private $precioUnitario;

    /**
     * @var string
     */
    private $modelo;

    /** 
    * @var string 
    */
    private $llave;

    /** 
    * @var sting
    */
    private $llavePath;

    /** 
    * @var string
    */
    private $certificado;

    /** 
    * @var string
    */
    private $certificadoPath;


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
     * Set serie
     *
     * @param string $serie
     *
     * @return Folio
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return string
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set folioInicial
     *
     * @param string $folioInicial
     *
     * @return Folio
     */
    public function setFolioInicial($folioInicial)
    {
        $this->folioInicial = $folioInicial;

        return $this;
    }

    /**
     * Get folioInicial
     *
     * @return string
     */
    public function getFolioInicial()
    {
        return $this->folioInicial;
    }

    /**
     * Set folioFinal
     *
     * @param string $folioFinal
     *
     * @return Folio
     */
    public function setFolioFinal($folioFinal)
    {
        $this->folioFinal = $folioFinal;

        return $this;
    }

    /**
     * Get folioFinal
     *
     * @return string
     */
    public function getFolioFinal()
    {
        return $this->folioFinal;
    }

    /**
     * Set tipoDocumento
     *
     * @param string $tipoDocumento
     *
     * @return Folio
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    /**
     * Get tipoDocumento
     *
     * @return string
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * Set lugarExpedicion
     *
     * @param string $lugarExpedicion
     *
     * @return Folio
     */
    public function setLugarExpedicion($lugarExpedicion)
    {
        $this->lugarExpedicion = $lugarExpedicion;

        return $this;
    }

    /**
     * Get lugarExpedicion
     *
     * @return string
     */
    public function getLugarExpedicion()
    {
        return $this->lugarExpedicion;
    }

    /**
     * Set precioUnitario
     *
     * @param integer $precioUnitario
     *
     * @return Folio
     */
    public function setPrecioUnitario($precioUnitario)
    {
        $this->precioUnitario = $precioUnitario;

        return $this;
    }

    /**
     * Get precioUnitario
     *
     * @return integer
     */
    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Folio
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /** 
    * Set llave
    *
    * @param string $llave
    *
    * @return Folio
    */
    public function setLlave($llave)
    {
        $this->llave = $llave;

        return $this;
    }

    /** 
    * Get llave
    *
    * @return string
    */
    public function getLlave()
    {
        return $this->llave;
    }

    /** 
    * Set llavePath
    *
    * @param string $llavePath
    * 
    * @return Folio
    */
    public function setLlavePath($llavePath)
    {
        $this->llavePath = $llavePath;

        return $this;
    }

    /** 
    * Get llavePath
    *
    * @return string
    */
    public function getLlavePath()
    {
        return $this->llavePath;
    }

    /**
    * Set certificado
    *
    * @param string $certificado
    *
    * @return Folio
    */
    public function setCertificado($certificado)
    {
        $this->certificado = $certificado;

        return $this;
    }

    /** 
    * Get certificado
    *
    * @return string
    */
    public function getCertificado()
    {
        return $this->certificado;
    }

    /** 
    * Set certificadoPath
    *
    * @param string $certificadoPath
    *
    * @return Folio
    */
    public function setCertificadoPath($certificadoPath)
    {
        $this->certificadoPath = $certificadoPath;

        return $this;
    }

    /** 
    * Get certificadoPath
    *
    * @return Folio
    */ 
    public function getCertificadoPath()
    {
        return $this->certificadoPath;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload($dir='Archivos')
    {
        // the file property can be empty if the field is not required
        if (null === $this->getLlave()) {
            return false;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target filename as params
        $this->getLlave()->move(
            $this->getUploadRootDir($dir),
            urlencode(time().$this->getLlave()->getClientOriginalName())
        );

        // set the path property to the filename where you've saved the file
        $this->llavePath = urlencode(time().$this->getLlave()->getClientOriginalName());
        $this->llave=$this->getUploadDir($dir).'/'.$this->llavePath;
        return true;
        // clean up the f$this->path = $this->getFile()->getClientOriginalName();ile property as you won't need it anymore
        //$this->setImagen(null);
    }

     /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
   
    public function getAbsolutePath()
    {
        return null === $this->llavePath
            ? null
            : $this->getUploadRootDir().'/'.$this->llavePath;
    }

    public function getWebPath()
    {
        return null === $this->llavePath
            ? null
            : $this->getUploadDir().'/'.$this->llavePath;
    }

    protected function getUploadRootDir($dir='Archivos')
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../../web/'.$this->getUploadDir($dir);
    }

    protected function getUploadDir($dir='Archivos')
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/'.$dir;
    }

}
