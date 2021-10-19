<?php
namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="currency")
 *
 * @author mac
 *        
 */
class Currency
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
     *
     * @var string
     */
    private $currencyName;

    /**
     *
     * @var string @ORM\Column(name="code", type="string", length=10, nullable=true)
     */
    private $code;

    /**
     *
     * @var string @ORM\Column(name="iso_code", type="string", length=45, nullable=true)
     */
    private $isoCode;

    /**
     * @ORM\Column(name="created_on", type="datetime", nullable=false)
     * 
     * @var created
     */
    private $createdOn;

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
     * @return the $currencyName
     */
    public function getCurrencyName()
    {
        return $this->currencyName;
    }

    /**
     * @return the $code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return the $isoCode
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * @return the $createdOn
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
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
     * @param string $currencyName
     */
    public function setCurrencyName($currencyName)
    {
        $this->currencyName = $currencyName;
        return $this;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param string $isoCode
     */
    public function setIsoCode($isoCode)
    {
        $this->isoCode = $isoCode;
        return $this;
    }

    /**
     * @param \General\Entity\created $createdOn
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }

}

