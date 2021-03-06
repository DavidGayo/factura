<?php

namespace Facturas\FacturasBundle\Entity;

/**
 * Llave
 */
class Llave
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $llave;

    /**
     * @var string
     */
    private $path;


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
     * Set llave
     *
     * @param string $llave
     *
     * @return Llave
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
     * Set path
     *
     * @param string $path
     *
     * @return Llave
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload($dir='Llave')
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
        $this->path = urlencode(time().$this->getLlave()->getClientOriginalName());
        $this->llave=$this->getUploadDir($dir).'/'.$this->path;
        return true;
        // clean up the f$this->path = $this->getFile()->getClientOriginalName();ile property as you won't need it anymore
        //$this->setImagen(null);
    }

     /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
   
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir($dir='Llave')
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir($dir);
    }

    protected function getUploadDir($dir='Llave')
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/'.$dir;
    }

   public function __toString()
   { 
     return $this->id;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $folio;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->folio = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add folio
     *
     * @param \Facturas\FacturasBundle\Entity\Folio $folio
     *
     * @return Llave
     */
    public function addFolio(\Facturas\FacturasBundle\Entity\Folio $folio)
    {
        $this->folio[] = $folio;

        return $this;
    }

    /**
     * Remove folio
     *
     * @param \Facturas\FacturasBundle\Entity\Folio $folio
     */
    public function removeFolio(\Facturas\FacturasBundle\Entity\Folio $folio)
    {
        $this->folio->removeElement($folio);
    }

    /**
     * Get folio
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFolio()
    {
        return $this->folio;
    }
}
