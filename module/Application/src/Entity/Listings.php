<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\Entity\Currency;
use User\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use General\Entity\Country;

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
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="General\Entity\Country")
     * @var Country
     */
    private $country;

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

//     /**
//      * This is the string code for the assi
//      *
//      * @ORM\Entity
//      * @var Currency
//      */
//     private $currency;

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
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     * @var boolean
     */
    private $isActive;

    /**
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->listingCategory = new ArrayCollection();
    }

    /**
     * @param int $id
     * @return Listings
     */
    public function setId(int $id): Listings
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $listingUid
     * @return Listings
     */
    public function setListingUid(string $listingUid): Listings
    {
        $this->listingUid = $listingUid;
        return $this;
    }

    /**
     * @return string
     */
    public function getListingUid(): string
    {
        return $this->listingUid;
    }

    /**
     * @param Currency $currency
     * @return Listings
     */
    public function setCurrency(Currency $currency): Listings
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param ListingsBusinessType $listingBusinessType
     * @return Listings
     */
    public function setListingBusinessType(ListingsBusinessType $listingBusinessType): Listings
    {
        $this->listingBusinessType = $listingBusinessType;
        return $this;
    }

    /**
     * @return ListingsBusinessType
     */
    public function getListingBusinessType(): ListingsBusinessType
    {
        return $this->listingBusinessType;
    }

    /**
     * @param string $listingTitle
     * @return Listings
     */
    public function setListingTitle(string $listingTitle): Listings
    {
        $this->listingTitle = $listingTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getListingTitle(): string
    {
        return $this->listingTitle;
    }

    /**
     * @param string $listingDesc
     * @return Listings
     */
    public function setListingDesc(string $listingDesc): Listings
    {
        $this->listingDesc = $listingDesc;
        return $this;
    }

    /**
     * @return string
     */
    public function getListingDesc(): string
    {
        return $this->listingDesc;
    }

    /**
     * @param User $listedBy
     * @return Listings
     */
    public function setListedBy(User $listedBy): Listings
    {
        $this->listedBy = $listedBy;
        return $this;
    }

    /**
     * @return User
     */
    public function getListedBy(): User
    {
        return $this->listedBy;
    }

    /**
     * @param ListingCompany $listedFor
     * @return Listings
     */
    public function setListedFor(ListingCompany $listedFor): Listings
    {
        $this->listedFor = $listedFor;
        return $this;
    }

    /**
     * @return ListingCompany
     */
    public function getListedFor(): ListingCompany
    {
        return $this->listedFor;
    }

    /**
     * @param Collection $listingCategory
     * @return Listings
     */
    public function setListingCategory($listingCategory)
    {
        $this->listingCategory = $listingCategory;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getListingCategory()
    {
        return $this->listingCategory;
    }

    /**
     * @param ListingsSegment $listingSegment
     * @return Listings
     */
    public function setListingSegment(ListingsSegment $listingSegment): Listings
    {
        $this->listingSegment = $listingSegment;
        return $this;
    }

    /**
     * @return ListingsSegment
     */
    public function getListingSegment(): ListingsSegment
    {
        return $this->listingSegment;
    }

    /**
     * @param ListingStatus $listingStatus
     * @return Listings
     */
    public function setListingStatus(ListingStatus $listingStatus): Listings
    {
        $this->listingStatus = $listingStatus;
        return $this;
    }

    /**
     * @return ListingStatus
     */
    public function getListingStatus(): ListingStatus
    {
        return $this->listingStatus;
    }

    /**
     * @param \DateTime $createdOn
     * @return Listings
     */
    public function setCreatedOn(\DateTime $createdOn): Listings
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
     * @return Listings
     */
    public function setUpdatedOn(\DateTime $updatedOn): Listings
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
     * @param ListingsBusinessDetails $businessDetails
     * @return Listings
     */
    public function setBusinessDetails(ListingsBusinessDetails $businessDetails): Listings
    {
        $this->businessDetails = $businessDetails;
        return $this;
    }

    /**
     * @return ListingsBusinessDetails
     */
    public function getBusinessDetails(): ListingsBusinessDetails
    {
        return $this->businessDetails;
    }

    /**
     * @param ListingsFranchiseDetails $franchiseDetails
     * @return Listings
     */
    public function setFranchiseDetails(ListingsFranchiseDetails $franchiseDetails): Listings
    {
        $this->franchiseDetails = $franchiseDetails;
        return $this;
    }

    /**
     * @return ListingsFranchiseDetails
     */
    public function getFranchiseDetails(): ListingsFranchiseDetails
    {
        return $this->franchiseDetails;
    }

    /**
     * @param bool $isFeatured
     * @return Listings
     */
    public function setIsFeatured(bool $isFeatured): Listings
    {
        $this->isFeatured = $isFeatured;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFeatured(): bool
    {
        return $this->isFeatured;
    }

    /**
     * @param Collection $images
     * @return Listings
     */
    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param bool $isActive
     * @return Listings
     */
    public function setIsActive(bool $isActive): Listings
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }



}

