<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="listingFeatured")
 *
 * @author mac
 *        
 */
class ListingFeatured
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
     * @ORM\ManyToOne(targetEntity="Listings")
     *
     * @var Listings
     */
    private $listings;

    /**
     * @ORM\Column(name="starton", type="datetime", nullable=false)
     *
     * @var \DateTime
     */
    private $starton;

    /**
     * @ORM\Column(name="endon", type="datetime", nullable=false)
     *
     * @var \DateTime
     */
    private $endOn;

    /**
     * @ORM\Column(name="created_on", type="datetime", nullable=false)
     *
     * @var \DateTime
     */
    private $createdOn;

    /**
     * @ORM\Column(name="updated_on", type="datetime", nullable=true)
     *
     * @var unknown
     */
    private $updatedOn;

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
}

