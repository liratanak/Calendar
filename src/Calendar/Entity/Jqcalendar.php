<?php

namespace Calendar\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jqcalendar
 *
 * @ORM\Table(name="jqcalendar")
 * @ORM\Entity(repositoryClass="Calendar\Repository\JqcalendarRepository")
 */
class Jqcalendar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Subject", type="string", length=1000, nullable=true)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="Location", type="string", length=200, nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="StartTime", type="datetime", nullable=true)
     */
    private $starttime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="EndTime", type="datetime", nullable=true)
     */
    private $endtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="IsAllDayEvent", type="smallint", nullable=false)
     */
    private $isalldayevent;

    /**
     * @var string
     *
     * @ORM\Column(name="Color", type="string", length=200, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="RecurringRule", type="string", length=500, nullable=true)
     */
    private $recurringrule;



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
     * Set subject
     *
     * @param string $subject
     * @return Jqcalendar
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    
        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Jqcalendar
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Jqcalendar
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set starttime
     *
     * @param \DateTime $starttime
     * @return Jqcalendar
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;
    
        return $this;
    }

    /**
     * Get starttime
     *
     * @return \DateTime 
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Set endtime
     *
     * @param \DateTime $endtime
     * @return Jqcalendar
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;
    
        return $this;
    }

    /**
     * Get endtime
     *
     * @return \DateTime 
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Set isalldayevent
     *
     * @param integer $isalldayevent
     * @return Jqcalendar
     */
    public function setIsalldayevent($isalldayevent)
    {
        $this->isalldayevent = $isalldayevent;
    
        return $this;
    }

    /**
     * Get isalldayevent
     *
     * @return integer 
     */
    public function getIsalldayevent()
    {
        return $this->isalldayevent;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Jqcalendar
     */
    public function setColor($color)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set recurringrule
     *
     * @param string $recurringrule
     * @return Jqcalendar
     */
    public function setRecurringrule($recurringrule)
    {
        $this->recurringrule = $recurringrule;
    
        return $this;
    }

    /**
     * Get recurringrule
     *
     * @return string 
     */
    public function getRecurringrule()
    {
        return $this->recurringrule;
    }
}