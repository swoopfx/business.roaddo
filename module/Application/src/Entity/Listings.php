<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\Entity\Currency;
use User\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use General\Entity\Country;
use Application\Entity\ListingBusinessState;
use General\Entity\Zone;
use General\Entity\TurnOverTerm;

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
     * @ORM\ManyToOne(targetEntity="General\Entity\Country")
     * 
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

    // /**
    // * This is the string code for the assi
    // *
    // * @ORM\Entity
    // * @var Currency
    // */
    // private $currency;
    
    /**
     * @ORM\ManyToOne(targetEntity="ListingsBusinessType")
     *
     * @var ListingsBusinessType
     */
    private $listingBusinessType;

    /**
     * For sale
     *
     * @ORM\ManyToOne(targetEntity="ListingBusinessState")
     * 
     * @var ListingBusinessState
     */
    private $listingBusinessState;

    /**
     * @ORM\Column(name="is_confidential", type="boolean", nullable=true)
     * 
     * @var boolean
     */
    private $isConfidential;

    /**
     * @ORM\Column(name="is_reloactable", type="boolean", nullable=true)
     * 
     * @var boolean
     */
    private $isRelocatable;

    /**
     * @ORM\Column(name="is_list_location", type="boolean", nullable=true)
     * 
     * @var boolean
     */
    private $isListLocation;

    /**
     *
     * @ORM\ManyToOne(targetEntity="General\Entity\Zone")
     * 
     * @var Zone
     */
    private $city;

    /**
     * @ORM\Column(name="asking_price", nullable=true)
     * 
     * @var string
     */
    private $askingPrice;

    /**
     * @ORM\Column(name="asking_price_as", nullable=true)
     * 
     * @var string
     */
    private $askingPriceAs;

    /**
     * @ORM\ManyToOne(targetEntity="ListingPropertyStatus")
     * 
     * @var ListingPropertyStatus
     */
    private $propertyStatus;

    /**
     * @ORM\Column(name="turn_over", nullable=true)
     * 
     * @var string
     */
    private $turnOver;

    /**
     * @ORM\ManyToOne(targetEntity="General\Entity\TurnOverTerm")
     * 
     * @var TurnOverTerm
     */
    private $turnOverTerm;

    /**
     *
     * @ORM\Column(name="netprofit", type="string", nullable=true)
     * 
     * @var string
     */
    private $netprofit;

    /**
     * @ORM\ManyToOne(targetEntity="General\Entity\TurnOverTerm")
     * 
     * @var TurnOverTerm
     */
    private $netProfitTerm;

    /**
     * @ORM\Column(name="website_address", type="string", nullable=true)
     * 
     * @var string
     */
    private $websiteAddress;

    /**
     * @ORM\Column(name="number_of_employees", type="string", nullable=true)
     * 
     * @var string
     */
    private $numberOfEmployees;

    /**
     * @ORM\Column(name="embedded_video", type="string", nullable=true)
     * 
     * @var string
     */
    private $embeddedVideo;

    /**
     * Online
     * Home Based
     * @ORM\Column(name="business_location", type="string", nullable=true)
     * 
     * @var string
     */
    private $bussinessLocation;

    // private
    
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
     * 
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
     *
     * @param int $id            
     * @return Listings
     */
    public function setId(int $id): Listings
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     *
     * @param string $listingUid            
     * @return Listings
     */
    public function setListingUid(string $listingUid): Listings
    {
        $this->listingUid = $listingUid;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getListingUid(): string
    {
        return $this->listingUid;
    }

    /**
     *
     * @param Currency $currency            
     * @return Listings
     */
    public function setCurrency(Currency $currency): Listings
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     *
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     *
     * @param ListingsBusinessType $listingBusinessType            
     * @return Listings
     */
    public function setListingBusinessType(ListingsBusinessType $listingBusinessType): Listings
    {
        $this->listingBusinessType = $listingBusinessType;
        return $this;
    }

    /**
     *
     * @return ListingsBusinessType
     */
    public function getListingBusinessType(): ListingsBusinessType
    {
        return $this->listingBusinessType;
    }

    /**
     *
     * @param string $listingTitle            
     * @return Listings
     */
    public function setListingTitle(string $listingTitle): Listings
    {
        $this->listingTitle = $listingTitle;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getListingTitle(): string
    {
        return $this->listingTitle;
    }

    /**
     *
     * @param string $listingDesc            
     * @return Listings
     */
    public function setListingDesc(string $listingDesc): Listings
    {
        $this->listingDesc = $listingDesc;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getListingDesc(): string
    {
        return $this->listingDesc;
    }

    /**
     *
     * @param User $listedBy            
     * @return Listings
     */
    public function setListedBy(User $listedBy): Listings
    {
        $this->listedBy = $listedBy;
        return $this;
    }

    /**
     *
     * @return User
     */
    public function getListedBy(): User
    {
        return $this->listedBy;
    }

    /**
     *
     * @param ListingCompany $listedFor            
     * @return Listings
     */
    public function setListedFor(ListingCompany $listedFor): Listings
    {
        $this->listedFor = $listedFor;
        return $this;
    }

    /**
     *
     * @return ListingCompany
     */
    public function getListedFor(): ListingCompany
    {
        return $this->listedFor;
    }

    /**
     *
     * @param Collection $listingCategory            
     * @return Listings
     */
    public function setListingCategory($listingCategory)
    {
        $this->listingCategory = $listingCategory;
        return $this;
    }

    /**
     *
     * @return Collection
     */
    public function getListingCategory()
    {
        return $this->listingCategory;
    }

    /**
     *
     * @param ListingsSegment $listingSegment            
     * @return Listings
     */
    public function setListingSegment(ListingsSegment $listingSegment): Listings
    {
        $this->listingSegment = $listingSegment;
        return $this;
    }

    /**
     *
     * @return ListingsSegment
     */
    public function getListingSegment(): ListingsSegment
    {
        return $this->listingSegment;
    }

    /**
     *
     * @param ListingStatus $listingStatus            
     * @return Listings
     */
    public function setListingStatus(ListingStatus $listingStatus): Listings
    {
        $this->listingStatus = $listingStatus;
        return $this;
    }

    /**
     *
     * @return ListingStatus
     */
    public function getListingStatus(): ListingStatus
    {
        return $this->listingStatus;
    }

    /**
     *
     * @param \DateTime $createdOn            
     * @return Listings
     */
    public function setCreatedOn(\DateTime $createdOn): Listings
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     *
     * @return \DateTime
     */
    public function getCreatedOn(): \DateTime
    {
        return $this->createdOn;
    }

    /**
     *
     * @param \DateTime $updatedOn            
     * @return Listings
     */
    public function setUpdatedOn(\DateTime $updatedOn): Listings
    {
        $this->updatedOn = $updatedOn;
        return $this;
    }

    /**
     *
     * @return \DateTime
     */
    public function getUpdatedOn(): \DateTime
    {
        return $this->updatedOn;
    }

    /**
     *
     * @param ListingsBusinessDetails $businessDetails            
     * @return Listings
     */
    public function setBusinessDetails(ListingsBusinessDetails $businessDetails): Listings
    {
        $this->businessDetails = $businessDetails;
        return $this;
    }

    /**
     *
     * @return ListingsBusinessDetails
     */
    public function getBusinessDetails(): ListingsBusinessDetails
    {
        return $this->businessDetails;
    }

    /**
     *
     * @param ListingsFranchiseDetails $franchiseDetails            
     * @return Listings
     */
    public function setFranchiseDetails(ListingsFranchiseDetails $franchiseDetails): Listings
    {
        $this->franchiseDetails = $franchiseDetails;
        return $this;
    }

    /**
     *
     * @return ListingsFranchiseDetails
     */
    public function getFranchiseDetails(): ListingsFranchiseDetails
    {
        return $this->franchiseDetails;
    }

    /**
     *
     * @param bool $isFeatured            
     * @return Listings
     */
    public function setIsFeatured(bool $isFeatured): Listings
    {
        $this->isFeatured = $isFeatured;
        return $this;
    }

    /**
     *
     * @return bool
     */
    public function isFeatured(): bool
    {
        return $this->isFeatured;
    }

    /**
     *
     * @param Collection $images            
     * @return Listings
     */
    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }

    /**
     *
     * @return Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     *
     * @param bool $isActive            
     * @return Listings
     */
    public function setIsActive(bool $isActive): Listings
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }
    /**
     * @return the $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return the $listingBusinessState
     */
    public function getListingBusinessState()
    {
        return $this->listingBusinessState;
    }

    /**
     * @return the $isConfidential
     */
    public function getIsConfidential()
    {
        return $this->isConfidential;
    }

    /**
     * @return the $isRelocatable
     */
    public function getIsRelocatable()
    {
        return $this->isRelocatable;
    }

    /**
     * @return the $isListLocation
     */
    public function getIsListLocation()
    {
        return $this->isListLocation;
    }

    /**
     * @return the $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return the $askingPrice
     */
    public function getAskingPrice()
    {
        return $this->askingPrice;
    }

    /**
     * @return the $askingPriceAs
     */
    public function getAskingPriceAs()
    {
        return $this->askingPriceAs;
    }

    /**
     * @return the $propertyStatus
     */
    public function getPropertyStatus()
    {
        return $this->propertyStatus;
    }

    /**
     * @return the $turnOver
     */
    public function getTurnOver()
    {
        return $this->turnOver;
    }

    /**
     * @return the $turnOverTerm
     */
    public function getTurnOverTerm()
    {
        return $this->turnOverTerm;
    }

    /**
     * @return the $netprofit
     */
    public function getNetprofit()
    {
        return $this->netprofit;
    }

    /**
     * @return the $netProfitTerm
     */
    public function getNetProfitTerm()
    {
        return $this->netProfitTerm;
    }

    /**
     * @return the $websiteAddress
     */
    public function getWebsiteAddress()
    {
        return $this->websiteAddress;
    }

    /**
     * @return the $numberOfEmployees
     */
    public function getNumberOfEmployees()
    {
        return $this->numberOfEmployees;
    }

    /**
     * @return the $embeddedVideo
     */
    public function getEmbeddedVideo()
    {
        return $this->embeddedVideo;
    }

    /**
     * @return the $bussinessLocation
     */
    public function getBussinessLocation()
    {
        return $this->bussinessLocation;
    }

    /**
     * @return the $isFeatured
     */
    public function getIsFeatured()
    {
        return $this->isFeatured;
    }

    /**
     * @return the $isActive
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param \General\Entity\Country $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @param \Application\Entity\ListingBusinessState $listingBusinessState
     */
    public function setListingBusinessState($listingBusinessState)
    {
        $this->listingBusinessState = $listingBusinessState;
        return $this;
    }

    /**
     * @param boolean $isConfidential
     */
    public function setIsConfidential($isConfidential)
    {
        $this->isConfidential = $isConfidential;
        return $this;
    }

    /**
     * @param boolean $isRelocatable
     */
    public function setIsRelocatable($isRelocatable)
    {
        $this->isRelocatable = $isRelocatable;
        return $this;
    }

    /**
     * @param boolean $isListLocation
     */
    public function setIsListLocation($isListLocation)
    {
        $this->isListLocation = $isListLocation;
        return $this;
    }

    /**
     * @param \Settings\Entity\Zone $city
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param string $askingPrice
     */
    public function setAskingPrice($askingPrice)
    {
        $this->askingPrice = $askingPrice;
        return $this;
    }

    /**
     * @param string $askingPriceAs
     */
    public function setAskingPriceAs($askingPriceAs)
    {
        $this->askingPriceAs = $askingPriceAs;
        return $this;
    }

    /**
     * @param \Application\Entity\ListingPropertyStatus $propertyStatus
     */
    public function setPropertyStatus($propertyStatus)
    {
        $this->propertyStatus = $propertyStatus;
        return $this;
    }

    /**
     * @param string $turnOver
     */
    public function setTurnOver($turnOver)
    {
        $this->turnOver = $turnOver;
        return $this;
    }

    /**
     * @param \General\Entity\TurnOverTerm $turnOverTerm
     */
    public function setTurnOverTerm($turnOverTerm)
    {
        $this->turnOverTerm = $turnOverTerm;
        return $this;
    }

    /**
     * @param string $netprofit
     */
    public function setNetprofit($netprofit)
    {
        $this->netprofit = $netprofit;
        return $this;
    }

    /**
     * @param \General\Entity\TurnOverTerm $netProfitTerm
     */
    public function setNetProfitTerm($netProfitTerm)
    {
        $this->netProfitTerm = $netProfitTerm;
        return $this;
    }

    /**
     * @param string $websiteAddress
     */
    public function setWebsiteAddress($websiteAddress)
    {
        $this->websiteAddress = $websiteAddress;
        return $this;
    }

    /**
     * @param string $numberOfEmployees
     */
    public function setNumberOfEmployees($numberOfEmployees)
    {
        $this->numberOfEmployees = $numberOfEmployees;
        return $this;
    }

    /**
     * @param string $embeddedVideo
     */
    public function setEmbeddedVideo($embeddedVideo)
    {
        $this->embeddedVideo = $embeddedVideo;
        return $this;
    }

    /**
     * @param string $bussinessLocation
     */
    public function setBussinessLocation($bussinessLocation)
    {
        $this->bussinessLocation = $bussinessLocation;
        return $this;
    }

}

