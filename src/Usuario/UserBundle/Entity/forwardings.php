<?php

namespace Usuario\UserBundle\Entity;

/**
 * forwardings
 */
class forwardings
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $destination;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return urlencode($this->source);
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return forwardings
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set destination
     *
     * @param string $destination
     *
     * @return forwardings
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }
}
