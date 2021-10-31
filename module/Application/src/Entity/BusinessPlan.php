<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * This is the defined package for subscriptiion 
 * 
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
     * @param string $planUid
     * @return BusinessPlan
     */
    public function setPlanUid(string $planUid): BusinessPlan
    {
        $this->planUid = $planUid;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlanUid(): string
    {
        return $this->planUid;
    }


    /**
     * @ORM\Column(name="plan_uid", type="string", nullable=false)
     * @var string
     */
    private $planUid;

    /**
     * @ORM\Column(name="plan_name", type="string", nullable=false)
     * 
     * @var string
     */
    private $planName;

    /**
     * @ORM\Column(name="duration", type="string", nullable=true)
     * 
     * @var string
     */
    private $duration;

    /**
     * @ORM\Column(name="price", type="string", nullable=true)
     * 
     * @var string
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="ListingsBusinessPlanFeature", mappedBy="businessPlan")
     * 
     * @var Collection
     */
    private $features;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_on", type="datetime", nullable=true)
     */
    private $createdOn;



    /**
     * @var \DateTime
     * @ORM\Column(name="updated_on", type="datetime", nullable=true)
     */
    private $updatedOn;

    /**
     */
    public function __construct()
    {
        $this->features = new ArrayCollection();
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
     * @return the $planName
     */
    public function getPlanName()
    {
        return $this->planName;
    }

    /**
     *
     * @return the $duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     *
     * @return the $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     *
     * @return the $features
     */
    public function getFeatures()
    {
        return $this->features;
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
     * @param string $planName            
     */
    public function setPlanName($planName)
    {
        $this->planName = $planName;
        return $this;
    }

    /**
     *
     * @param string $duration            
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     *
     * @param string $price            
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param \DateTime $createdOn
     * @return BusinessPlan
     */
    public function setCreatedOn(\DateTime $createdOn): BusinessPlan
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedOn(): \DateTime
    {
        return $this->createdOn;
    }

    /**
     * @param \DateTime $updatedOn
     * @return BusinessPlan
     */
    public function setUpdatedOn(\DateTime $updatedOn): BusinessPlan
    {
        $this->updatedOn = $updatedOn;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedOn(): \DateTime
    {
        return $this->updatedOn;
    }

    /**
     *
     * @param \Doctrine\Common\Collections\Collection $features            
     */
    public function addFeatures(ListingsBusinessPlanFeature $features)
    {
        if (! $this->features->contains($features)) {
            $this->features->add($features);
            $features->setBusinessPlan($this);
        }
        return $this;
    }
}

