<?php

namespace Usuario\UserBundle\Entity;

/**
 * domains
 */
class domains
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $domain;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return urlencode($this->domain);
    }

    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return domains
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }
}
