<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Work
 *
 * @ORM\Table(name="work")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WorkRepository")
 */
class Work
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="summary", type="text")
     */
    private $summary;

    /**
     * @var string
     *
     * @Assert\Choice(choices = {"Cloud Computing", "SOA", "BPM", "Web Services"})
     * @ORM\Column(name="theme", type="string", length=255)
     */
    private $theme;

    /**
     * @var string
     *
     * @Assert\Email()
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     *
     * @Assert\Email()
     * @ORM\Column(name="gmail", type="string", length=255)
     */
    private $gmail;

    /**
     * @var string
     *
     * @Assert\Choice(choices = {"Poster", "Conferencia"})
     * @ORM\Column(name="presentationType", type="string", length=255)
     */
    private $presentationType;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=true)
     */
    private $state;

    /**
     *
     * @ORM\Column(name="documentId", type="string", length=255, nullable=true)
     */
    private $documentId;

    /**
     *
     * @ORM\Column(name="documentFinished", type="boolean")
     */
    private $documentFinished;

    /**
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

     /** 
      *
      * @ORM\OneToMany(targetEntity="Author", mappedBy="work", cascade={"persist"})
      */
    private $secondaryAuthors;

    /**
     * @ORM\OneToOne(targetEntity="Exposition")
     * @ORM\JoinColumn(name="exposition_id", referencedColumnName="id", nullable=true)
     */
    private $exposition;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Work
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Work
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Work
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set theme
     *
     * @param string $theme
     *
     * @return Work
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Work
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
     * Set gmail
     *
     * @param string $gmail
     *
     * @return Work
     */
    public function setGmail($gmail)
    {
        $this->gmail = $gmail;

        return $this;
    }

    /**
     * Get gmail
     *
     * @return string
     */
    public function getGmail()
    {
        return $this->gmail;
    }

    /**
     * Set presentationType
     *
     * @param string $presentationType
     *
     * @return Work
     */
    public function setPresentationType($presentationType)
    {
        $this->presentationType = $presentationType;

        return $this;
    }

    /**
     * Get presentationType
     *
     * @return string
     */
    public function getPresentationType()
    {
        return $this->presentationType;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Work
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->secondaryAuthors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add secondaryAuthor
     *
     * @param \AppBundle\Entity\Author $secondaryAuthor
     *
     * @return Work
     */
    public function addSecondaryAuthor(\AppBundle\Entity\Author $secondaryAuthor)
    {
        $secondaryAuthor->setWork($this);
        $this->secondaryAuthors[] = $secondaryAuthor;
        return $this;
    }

    /**
     * Remove secondaryAuthor
     *
     * @param \AppBundle\Entity\Author $secondaryAuthor
     */
    public function removeSecondaryAuthor(\AppBundle\Entity\Author $secondaryAuthor)
    {
        $this->secondaryAuthors->removeElement($secondaryAuthor);
    }

    /**
     * Get secondaryAuthors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSecondaryAuthors()
    {
        return $this->secondaryAuthors;
    }

    /**
     * Set exposition
     *
     * @param \AppBundle\Entity\Exposition $exposition
     *
     * @return Work
     */
    public function setExposition(\AppBundle\Entity\Exposition $exposition = null)
    {
        $this->exposition = $exposition;

        return $this;
    }

    /**
     * Get exposition
     *
     * @return \AppBundle\Entity\Exposition
     */
    public function getExposition()
    {
        return $this->exposition;
    }

    /**
     * Set documentId
     *
     * @param string $documentId
     *
     * @return Work
     */
    public function setDocumentId($documentId)
    {
        $this->documentId = $documentId;

        return $this;
    }

    /**
     * Get documentId
     *
     * @return string
     */
    public function getDocumentId()
    {
        return $this->documentId;
    }

    /**
     * Set documentFinished
     *
     * @param boolean $documentFinished
     *
     * @return Work
     */
    public function setDocumentFinished($documentFinished)
    {
        $this->documentFinished = $documentFinished;

        return $this;
    }

    /**
     * Get documentFinished
     *
     * @return boolean
     */
    public function getDocumentFinished()
    {
        return $this->documentFinished;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Work
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }
}
