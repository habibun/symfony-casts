<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity
 */
class DeliciousCookie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="flavor", type="string", length=255)
     */
    private $flavor;

    /**
     * @ORM\Column(name="baker_username")
     */
    private $bakerUsername;

    /**
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $flavor
     * @return DeliciousCookie
     */
    public function setFlavor($flavor)
    {
        $this->flavor = $flavor;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getFlavor()
    {
        return $this->flavor;
    }

    /**
     * @return string
     */
    public function getBakerUsername()
    {
        return $this->bakerUsername;
    }

    /**
     * @param string $username
     */
    public function setBakerUsername($username)
    {
        $this->bakerUsername = $username;
    }
}
