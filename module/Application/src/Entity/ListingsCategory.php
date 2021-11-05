<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Retail Shop Business;
 * Accommodation,
 * Licensed & Leisure ,
 * Agriculture, Farming & Marine ,
 * Animal & Pest
 * Building & Construction
 * Fashion, Clothing & Footwear
 * This is a named category for the Listing
 * It is presented to the user form of stoy Shop etc.
 *
 * @ORM\Entity
 * @ORM\Table(name="listings_category")
 *
 * @author mac
 *
 */
class ListingsCategory
{

    /**
     *
     * @var integer @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     */
    private $id;
    
    /**
     * @ORM\Column(name="lcname", nullable=false)
     * @var string
     */
    private $name;

    /**
     * One Category has Many Categories.
     * @var Collection
     * @ORM\OneToMany(targetEntity="ListingsCategory", mappedBy="parent")
     */
    private $children;

    /**
     * Many Categories have One Category.
     * @ORM\ManyToOne(targetEntity="ListingsCategory", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * @ORM\Column (name="created_on", type="datetime", nullable=false)
     * @var \DateTime
     */
    private $createdOn;

    /**
     * @ORM\Column(name="updated_on", type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedOn;
    
    public function __construct(){
       $this->children = new ArrayCollection();
    }
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return the $children
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @return the $parent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return the $createdOn
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @return the $updatedOn
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param field_type $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @param field_type $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @param DateTime $createdOn
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * @param DateTime $updatedOn
     */
    public function setUpdatedOn($updatedOn)
    {
        $this->updatedOn = $updatedOn;
        return $this;
    }

}

