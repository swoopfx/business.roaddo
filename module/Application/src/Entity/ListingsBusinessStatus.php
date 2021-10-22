<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listed
 * Sold
 * Negotiating
 * Sale Agreed
 * Inactive
 *
 * Under Offer
 *
 * @ORM\Entity
 * @ORM\Table(name="listing_business_status")
 * 
 * @author mac
 *        
 */
class ListingsBusinessStatus
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
     * @ORM\Column(name="status", type="string", nullable=false)
     * 
     * @var string
     */
    private $status;

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
}

