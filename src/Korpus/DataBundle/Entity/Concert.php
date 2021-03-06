<?php

namespace Korpus\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concert
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Korpus\DataBundle\Entity\ConcertRepository")
 */
class Concert
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
     * @ORM\Column(name="event_name", type="string", length=255)
     */
    private $eventName;

    /**
     * @var string
     *
     * @ORM\Column(name="venue", type="string", length=255)
     */
    private $venue;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="edit_date", type="datetime", nullable=true)
     */
    private $editDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="concert_date", type="datetime")
     */
    private $concertDate;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_link", type="string", length=255, nullable=true)
     */
    private $facebookLink;

    /**
     * @ORM\ManyToOne(targetEntity="File")
     * @ORM\JoinColumn(name="flyer_id", referencedColumnName="id")
     * */
    private $flyer;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="string", length=255, nullable=true)
     */
    private $info;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @ORM\OneToOne(targetEntity="Event", mappedBy="concert")
     */
    private $event;

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
     * Set venue
     *
     * @param string $venue
     * @return Concert
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;

        return $this;
    }

    /**
     * Get venue
     *
     * @return string 
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Concert
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Concert
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Concert
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set editDate
     *
     * @param string $editDate
     * @return Concert
     */
    public function setEditDate($editDate)
    {
        $this->editDate = $editDate;

        return $this;
    }

    /**
     * Get editDate
     *
     * @return string 
     */
    public function getEditDate()
    {
        return $this->editDate;
    }

    /**
     * Set concertDate
     *
     * @param \DateTime $concertDate
     * @return Concert
     */
    public function setConcertDate($concertDate)
    {
        $this->concertDate = $concertDate;

        return $this;
    }

    /**
     * Get concertDate
     *
     * @return \DateTime 
     */
    public function getConcertDate()
    {
        return $this->concertDate;
    }

    public function getFacebookLink()
    {
        return $this->facebookLink;
    }

    public function setFacebookLink($facebookLink)
    {
        $this->facebookLink = $facebookLink;
    }

    public function getFlyer()
    {
        return $this->flyer;
    }

    public function setFlyer($flyer)
    {
        $this->flyer = $flyer;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getEventName()
    {
        return $this->eventName;
    }

    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function setEvent($event)
    {
        $this->event = $event;
    }

}
