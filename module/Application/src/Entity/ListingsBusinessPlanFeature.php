<?php
namespace Application\Entity;

/**
 *
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
     * @ORM\ManyToOne(targetEntity="business_plan", inversedBy="features")
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
}

