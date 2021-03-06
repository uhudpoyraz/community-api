<?php

namespace Phpist\Bundle\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table(name="event_session")
 * @ORM\Entity(repositoryClass="Phpist\Bundle\EventBundle\Repository\SessionRepository")
 */
class Session
{
    const STATUS_ACTIVE     = 'active';
    const STATUS_PASSIVE    = 'passive';
    const STATUS_DELETED    = 'deleted';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Event
     *
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="sessions")
     * @ORM\JoinColumn(name="event", referencedColumnName="id", nullable=true)
     */
    private $event;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @var Speaker
     *
     * @ORM\ManyToOne(targetEntity="Speaker", inversedBy="sessions")
     * @ORM\JoinColumn(name="speaker", referencedColumnName="id")
     */
    private $speaker;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;


    /**
     * @var string
     *
     * @ORM\Column(name="slide_embed_code", type="string", length=64)
     */
    private $slide_embed_code;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", columnDefinition="ENUM('active', 'passive', 'deleted')")
     */
    private $status;

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
     * Set event
     *
     * @param Event $event
     * @return Session
     */
    public function setEvent(Event $event)
    {
        $this->event = $event;
    
        return $this;
    }

    /**
     * Get Event
     *
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Session
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    
        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Session
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    
        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set speaker
     *
     * @param Speaker $speaker
     * @return Session
     */
    public function setSpeaker(Speaker $speaker)
    {
        $this->speaker = $speaker;
    
        return $this;
    }

    /**
     * Get speaker
     *
     * @return integer 
     */
    public function getSpeaker()
    {
        return $this->speaker;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return Session
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
     * @param string $slide_embed_code
     */
    public function setSlideEmbedCode($slide_embed_code)
    {
        $this->slide_embed_code = $slide_embed_code;
    }

    /**
     * @return string
     */
    public function getSlideEmbedCode()
    {
        return $this->slide_embed_code;
    }

    /**
     * Set status
     *
     * @param $status
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setStatus($status)
    {
        if (!in_array($status, $this->getStatusList())) {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function getStatusList()
    {
        return array(
            self::STATUS_ACTIVE,
            self::STATUS_PASSIVE,
            self::STATUS_DELETED
        );
    }
}
