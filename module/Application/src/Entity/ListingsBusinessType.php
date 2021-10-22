<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Entity\ListingsSegment;

/**
 * Retail Shop Business;
 * Accommodation,
 * Licensed & Leisure ,
 * Agriculture, Farming & Marine ,
 * Animal & Pest
 * Building & Construction
 * Fashion, Clothing & Footwear
 *
 *
 *
 * @ORM\Entity
 * @ORM\Table(name="listing_business_type")
 *
 * @author mac
 *        
 */
class ListingsBusinessType
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
     * @ORM\Column(name="typename", type="string", nullable=false)
     *
     * @var string
     */
    private $typename;

    /**
     * @ORM\Column(name="type_desc", type="text", nullable=false)
     *
     * @var string
     */
    private $typeDesc;

    /**
     * @ORM\Column(name="created_on", type="datetime", nullable=false)
     * 
     * @var \DateTime
     */
    private $createdOn;

    /**
     * @ORM\Column(name="updated_on", type="datetime", nullable=true)
     * 
     * @var \DateTime
     */
    private $updatedOn;

//     /**
//      * @ORM\ManyToOne(targetEntity="ListingsSegment")
//      * 
//      * @var ListingsSegment
//      */
//     private $segment;

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
}

