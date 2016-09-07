<?php

namespace ContactsBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Address
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ContactsBoxBundle\Entity\AddressRepository")
 */
class Address
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
     * @ORM\Column(name="city", type="string", length=50)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="houseNo", type="string", length=10)
     */
    private $houseNo;

    /**
     * @var string
     *
     * @ORM\Column(name="flatNo", type="string", length=10)
     */
    private $flatNo;
    
    /**
     * @ORM\OneToMany(targetEntity="Person",mappedBy="address")
     */
    private $persons;

    public function __construct() {
        $this->persons = new ArrayCollection();
    }
    
     public function __toString() {
        return $this->city." ".$this->street." ".$this->houseNo. ", apt: ".$this->flatNo;
    }


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
     * Set city
     *
     * @param string $city
     * @return Address
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
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set houseNo
     *
     * @param string $houseNo
     * @return Address
     */
    public function setHouseNo($houseNo)
    {
        $this->houseNo = $houseNo;

        return $this;
    }

    /**
     * Get houseNo
     *
     * @return string 
     */
    public function getHouseNo()
    {
        return $this->houseNo;
    }

    /**
     * Set flatNo
     *
     * @param string $flatNo
     * @return Address
     */
    public function setFlatNo($flatNo)
    {
        $this->flatNo = $flatNo;

        return $this;
    }

    /**
     * Get flatNo
     *
     * @return string 
     */
    public function getFlatNo()
    {
        return $this->flatNo;
    }

    /**
     * Add persons
     *
     * @param \ContactsBoxBundle\Entity\Person $persons
     * @return Address
     */
    public function addPerson(\ContactsBoxBundle\Entity\Person $persons)
    {
        $this->persons[] = $persons;

        return $this;
    }

    /**
     * Remove persons
     *
     * @param \ContactsBoxBundle\Entity\Person $persons
     */
    public function removePerson(\ContactsBoxBundle\Entity\Person $persons)
    {
        $this->persons->removeElement($persons);
    }

    /**
     * Get persons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersons()
    {
        return $this->persons;
    }
}
