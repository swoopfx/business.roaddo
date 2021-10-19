<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="listing_business_plan_feature")
 * @author mac
 *        
 */
class ListingsBusinessPlanFeature
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
     * @ORM\ManyToOne(targetEntity="BusinessPlan", inversedBy="features")
     * @var BusinessPlan
     */
    private $businessPlan;
    
    /**
     * @ORM\Column(name="feature_desc", type="text", nullable=false)
     * @var string
     */
    private $featureDesc;
    
    
    
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
     * @return the $businessPlan
     */
    public function getBusinessPlan()
    {
        return $this->businessPlan;
    }

    /**
     * @return the $featureDesc
     */
    public function getFeatureDesc()
    {
        return $this->featureDesc;
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
     * @param \Application\Entity\BusinessPlan $businessPlan
     */
    public function setBusinessPlan($businessPlan)
    {
        $this->businessPlan = $businessPlan;
        return $this;
    }

    /**
     * @param string $featureDesc
     */
    public function setFeatureDesc($featureDesc)
    {
        $this->featureDesc = $featureDesc;
        return $this;
    }

}

