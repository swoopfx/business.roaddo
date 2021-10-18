<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\Entity\Currency;
use User\Entity\User;

/**
 * @ORM\Entity
 * @ORM\Table(name="listings")
 * 
 * @author mac
 *        
 */
class Listings
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
     * @ORM\ManyToOne(targetEntity="General\Entity\Currency")
     * 
     * @var Currency
     */
    private $currency;

    /**
     * @ORM\Column(name="listing_title", type="string", nullable=true)
     * 
     * @var string
     */
    private $listingTitle;

    /**
     * @ORM\Column(name="listing_desc", type="text", nullable=true)
     * 
     * @var string
     */
    private $listingDesc;

    // private $
    
    /**
     * @ORM\ManyToOne(targetEntity="User\Entity\User")
     * 
     * @var User
     */
    private $listedBy;

    /**
     * @ORM\ManyToOne(targetEntity="ListingCompany")
     * 
     * @var ListingCompany
     */
    private $listedFor;

    /**
     * @ORM\ManyToOne(targetEntity="ListingsCategory")
     * 
     * @var ListingsCategory
     */
    private $listingCategory;

    /**
     * @ORM\ManyToOne(targetEntity="ListingsSegment")
     * 
     * @var ListingsSegment
     */
    private $listingSegment;

    /**
     * @ORM\Column(name="created_on", type="datetime", nullable=true)
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

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
}

