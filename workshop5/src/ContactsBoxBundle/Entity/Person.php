<?php

namespace ContactsBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ContactsBoxBundle\Entity\PersonRepository")
 */
class Person {

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
     * @ORM\Column(name="firstName", type="string", length=50)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=100)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Address",inversedBy="persons")
     * @ORM\JoinColumn(name="address_id",referencedColumnName="id")
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="Email",mappedBy="person")
     */
    private $emails;

    /**
     * @ORM\OneToMany(targetEntity="Telephone",mappedBy="person")
     */
    private $telephones;

    public function __construct() {
        $this->emails = new ArrayCollection();
        $this->telephones = new ArrayCollection();
    }
    public function __toString() {
        return $this->firstName." ".$this->lastName;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Person
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Person
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Person
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }


    /**
     * Set address
     *
     * @param \ContactsBoxBundle\Entity\Address $address
     * @return Person
     */
    public function setAddress(\ContactsBoxBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \ContactsBoxBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add emails
     *
     * @param \ContactsBoxBundle\Entity\Email $emails
     * @return Person
     */
    public function addEmail(\ContactsBoxBundle\Entity\Email $emails)
    {
        $this->emails[] = $emails;

        return $this;
    }

    /**
     * Remove emails
     *
     * @param \ContactsBoxBundle\Entity\Email $emails
     */
    public function removeEmail(\ContactsBoxBundle\Entity\Email $emails)
    {
        $this->emails->removeElement($emails);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add telephones
     *
     * @param \ContactsBoxBundle\Entity\Telephone $telephones
     * @return Person
     */
    public function addTelephone(\ContactsBoxBundle\Entity\Telephone $telephones)
    {
        $this->telephones[] = $telephones;

        return $this;
    }

    /**
     * Remove telephones
     *
     * @param \ContactsBoxBundle\Entity\Telephone $telephones
     */
    public function removeTelephone(\ContactsBoxBundle\Entity\Telephone $telephones)
    {
        $this->telephones->removeElement($telephones);
    }

    /**
     * Get telephones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTelephones()
    {
        return $this->telephones;
    }
}
