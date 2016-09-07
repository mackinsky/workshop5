<?php

namespace ContactsBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Telephone
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ContactsBoxBundle\Entity\TelephoneRepository")
 */
class Telephone
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
     * @ORM\Column(name="phoneNo", type="string", length=30)
     */
    private $phoneNo;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20)
     */
    private $type;
    
    /**
     * @ORM\ManyToOne(targetEntity="Person",inversedBy="telephones")
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
     * Set phoneNo
     *
     * @param string $phoneNo
     * @return Telephone
     */
    public function setPhoneNo($phoneNo)
    {
        $this->phoneNo = $phoneNo;

        return $this;
    }

    /**
     * Get phoneNo
     *
     * @return string 
     */
    public function getPhoneNo()
    {
        return $this->phoneNo;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Telephone
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
     * @return Telephone
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
