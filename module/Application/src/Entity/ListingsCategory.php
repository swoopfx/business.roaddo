<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * One Category has Many Categories.
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     */
    private $children;

    /**
     * Many Categories have One Category.
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
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
}

