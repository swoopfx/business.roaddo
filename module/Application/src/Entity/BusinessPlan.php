<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="business_plan")
 * 
 * @author mac
 *        
 */
class BusinessPlan
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
     * @ORM\Column(name="plan_name", type="string", nullable=false)
     * @var string
     */
    private $planName;
    
    /**
     * @ORM\Column(name="duration", type="string", nullable=true)
     * @var string
     */
    private $duration;
    
    /**
     * @ORM\Column(name="price", type="string", nullable=true)
     * @var string
     */
    private $price;
    
    /**
     * @ORM\oneToMany(targetEntity="", mappedBy="businessPlan")
     * @var Collection
     */
    private $features;

    /**
     */
    public function __construct()
    {
        
        $this->features = new ArrayCollection();
    }
}

