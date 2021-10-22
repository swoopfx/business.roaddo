<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\Entity\Currency;
use User\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

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

    // /**
    // * @ORM\Colun(name="is_active", type="boolean")
    // * @var boolean
    // */
    // private $isActive;
    
    /**
     * @ORM\Column(name="listingUid", type="string", nullable=false)
     *
     * @var string
     */
    private $listingUid;

    /**
     * This is the string code for the assi
     * 
     *
     * @var Currency
     */
    private $currency;

    /**
     * @ORM\ManyToOne(targetEntity="ListingsBusinessType")
     *
     * @var ListingsBusinessType
     */
    private $listingBusinessType;

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
     * The user that listed the
     * @ORM\ManyToOne(targetEntity="User\Entity\User")
     *
     * @var User
     */
    private $listedBy;

    /**
     * The Company being Listed
     * @ORM\ManyToOne(targetEntity="ListingCompany")
     *
     * @var ListingCompany
     */
    private $listedFor;

    /**
     *
     * A collection of isitings Category
     * @ORM\ManyToMany(targetEntity="ListingsCategory")
     * @ORM\JoinTable(name="listing_listings_category",
     * joinColumns={@ORM\JoinColumn(name="listing_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     * )
     *
     * @var Collection
     */
    private $listingCategory;

    /**
     * @ORM\ManyToOne(targetEntity="ListingsSegment")
     *
     * @var ListingsSegment
     */
    private $listingSegment;

    /**
     * @ORM\ManyToOne(targetEntity="ListingStatus")
     *
     * @var ListingStatus
     */
    private $listingStatus;

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
     * Called if the listing segment is a business
     * @ORM\OneToOne(targetEntity="ListingsBusinessDetails")
     *
     * @var ListingsBusinessDetails
     */
    private $businessDetails;

    /**
     * Called if the listing business is a frachinse 
     * @ORM\OneToOne(targetEntity="ListingsFranchiseDetails")
     *
     * @var ListingsFranchiseDetails
     */
    private $franchiseDetails;

    /**
     * 
     * @var boolean
     */
    private $isFeatured;

    // private
    
    /**
     *
     * A collection of documents for the policy
     * @ORM\ManyToMany(targetEntity="General\Entity\FileUpload")
     * @ORM\JoinTable(name="listing_uploaded_image",
     * joinColumns={@ORM\JoinColumn(name="listing_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id")}
     * )
     *
     * @var Collection
     */
    private $images;

    /**
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->listingCategory = new ArrayCollection();
    }
}

