<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
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
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     *     
     */
    private $id;

    // /**
    // * @ORM\ManyToOne(targetEntity="ListingsSegment")
    // * @var ListingsSegment
    // */
    // private $segment;
    
    /**
     * @ORM\Column(name="category_name", type="string", nullable=false)
     *
     * @var string
     */
    private $categoryName;

    /**
     *
     * @var \DateTime
     */
    private $createdOn;
}

