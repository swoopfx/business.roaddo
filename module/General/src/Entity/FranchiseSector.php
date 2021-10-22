<?php
namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Automotive
 * Business Opportunities
 * Business Services
 * Care Franchises
 * Childrens
 * Christmas & Seasonal Franchises
 * Cleaning
 * Courier Franchises
 * Education Franchises
 * Entertainment & Leisure
 * Events & Wedding Services Franchises
 * Fitness Franchises
 * Food and Drink Franchises
 * Fuel and Road Services Franchises
 * Gardening & Landscaping Franchises
 * Health & Beauty Franchises
 * Home Based Franchises
 * Home Improvement Franchises
 * Marketing - Digital, Direct and Data
 * Master Franchises
 * Mobile & Van Based Franchises
 * Online Franchises
 * Part-Time Franchises
 * Pet & Animal
 * Photography & Art Franchises
 * Property and Estate Agency
 * Retail
 * Services Based Franchises
 * Technology
 * Travel Franchises
 * 
 * @ORM\Entity
 * @ORM\Table(name="franchise_sector")
 * 
 * @author mac
 *        
 */
class FranchiseSector
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
     * @ORM\Column(name="sector", type="string", nullable=true)
     * 
     * @var string
     */
    private $sector;
    
    /**
     * @ORM\Column(name="description", type="string", nullable=true)
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(name="created_on", type="datetime", nullable=false)
     * 
     * @var \DateTime
     */
    private $createdOn;

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }

    /**
     *
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return the $sector
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     *
     * @return the $createdOn
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     *
     * @param number $id            
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @param string $sector            
     */
    public function setSector($sector)
    {
        $this->sector = $sector;
        return $this;
    }

    /**
     *
     * @param DateTime $createdOn            
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }
}

