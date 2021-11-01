<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="listing_property_status")
 * @author mac
 *        
 */
class ListingPropertyStatus
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
     * @ORM\Column(nullable=false)
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

