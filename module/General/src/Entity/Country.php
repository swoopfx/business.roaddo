<?php
namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\Entity\Currency;

/**
 * @ORM\Entity
 * @ORM\Table(name="country")
 *
 * @author mac
 *        
 */
class Country
{

    /**
     *
     * @var integer @ORM\Column(name="id", type="integer")
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     *     
     */
    private $id;

    /**
     * @ORM\Column(name="country_name", type="string", nullable=false)
     *
     * @var string
     */
    private $countryName;

    /**
     * @ORM\Column(name="iso_code_2", type="string", nullable=true)
     *
     * @var string
     */
    private $isoCode2;
    
    /**
     * @ORM\Column(name="iso_code_3", type="string", nullable=true)
     *
     * @var string
     */
    private $isoCode3;
    
    /**
     * @ORM\Column(name="address_format", type="text", nullable=true)
     *
     * @var string
     */
    private $addressFormat;
    
    /**
     * @ORM\Column(name="post_code_required", type="boolean", nullable=true)
     *
     * @var boolean
     */
    private $postCodeRequired;
    
    /**
     * @ORM\Column(name="status", type="boolean", nullable=false, options={"default"="1"})
     *
     * @var boolean
     */
    private $status = true;
    
    /**
     * @ORM\Column(name="is_activated", type="boolean", nullable=false, options={"default"="1"})
     * @var boolean
     */
    private $isActivated;

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $countryName
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @return the $isoCode2
     */
    public function getIsoCode2()
    {
        return $this->isoCode2;
    }

    /**
     * @return the $isoCode3
     */
    public function getIsoCode3()
    {
        return $this->isoCode3;
    }

    /**
     * @return the $addressFormat
     */
    public function getAddressFormat()
    {
        return $this->addressFormat;
    }

    /**
     * @return the $postCodeRequired
     */
    public function getPostCodeRequired()
    {
        return $this->postCodeRequired;
    }

    /**
     * @return the $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $countryName
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
        return $this;
    }

    /**
     * @param string $isoCode2
     */
    public function setIsoCode2($isoCode2)
    {
        $this->isoCode2 = $isoCode2;
        return $this;
    }

    /**
     * @param string $isoCode3
     */
    public function setIsoCode3($isoCode3)
    {
        $this->isoCode3 = $isoCode3;
        return $this;
    }

    /**
     * @param string $addressFormat
     */
    public function setAddressFormat($addressFormat)
    {
        $this->addressFormat = $addressFormat;
        return $this;
    }

    /**
     * @param boolean $postCodeRequired
     */
    public function setPostCodeRequired($postCodeRequired)
    {
        $this->postCodeRequired = $postCodeRequired;
        return $this;
    }

    /**
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

}

