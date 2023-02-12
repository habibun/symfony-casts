<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MovieRepository")
 * @ORM\Table(name="movie")
 */
class Movie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $samsCharacterName;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMainCharacter = false;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $releasedAt;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getSamsCharacterName()
    {
        return $this->samsCharacterName;
    }

    public function setSamsCharacterName($samsCharacterName)
    {
        $this->samsCharacterName = $samsCharacterName;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function getIsMainCharacter()
    {
        return $this->isMainCharacter;
    }

    public function setIsMainCharacter($isMainCharacter)
    {
        $this->isMainCharacter = $isMainCharacter;
    }

    public function getReleasedAt()
    {
        return $this->releasedAt;
    }

    public function setReleasedAt($releasedAt)
    {
        $this->releasedAt = $releasedAt;
    }
}
