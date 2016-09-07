<?php

namespace ContactsBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ContactsBoxBundle\Entity\EmailRepository")
 */
class Email
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
     * @ORM\Column(name="emailAddress", type="string", length=100)
     */
    private $emailAddress;
    

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20)
     */
    private $type;
    
    /**
     * @ORM\ManyToOne(targetEntity="Person",inversedBy="emails")
     * @ORM\JoinColumn(name="personId",referencedColumnName="id")
     */
    private $person;


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
     * Set emailAddress
     *
     * @param string $emailAddress
     * @return Email
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Email
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set person
     *
     * @param \ContactsBoxBundle\Entity\Person $person
     * @return Email
     */
    public function setPerson(\ContactsBoxBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \ContactsBoxBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }
}
