<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\Entity\FileUpload;


/**
 * @ORM\Entity
 * @ORM\Table(name="listing_company")
 *
 * @author mac
 *        
 */
class ListingCompany
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
     * @ORM\Column(name="company_title", type="string", nullable=false)
     * @var string
     */
    private $companyTitle;

    /**
     * @ORM\Column(name="company_profile", type="text", nullable=false)
     * @var string
     */
    // equivalent to company name
    private $companyProfile;

    /**
     * @ORM\ManyToOne(targetEntity="General\Entity\FileUpload")
     * @var FileUpload
     */
    private $profileImage;

    /**
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     * @var boolean
     */
    private $isActive;

    /**
     * @ORM\Column (name="created_on", type="datetime", nullable=false)
     * @var \DateTime
     */
    private $createdOn;

    /**
     * @ORM\Column (name="updated_on", type="datetime", nullable=false)
     * @var \DateTime
     */
    private $updatedOn;

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
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
     * @param string $companyTitle
     */
    public function setCompanyTitle(string $companyTitle)
    {
        $this->companyTitle = $companyTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyTitle(): string
    {
        return $this->companyTitle;
    }

    /**
     * @param string $companyProfile
     */
    public function setCompanyProfile(string $companyProfile)
    {
        $this->companyProfile = $companyProfile;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyProfile(): string
    {
        return $this->companyProfile;
    }

    /**
     * @param FileUpload $profileImage
     */
    public function setProfileImage(FileUpload $profileImage)
    {
        $this->profileImage = $profileImage;
        return $this;
    }

    /**
     * @return FileUpload
     */
    public function getProfileImage(): FileUpload
    {
        return $this->profileImage;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive)
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

    /**
     * @param \DateTime $createdOn
     */
    public function setCreatedOn(\DateTime $createdOn)
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
     */
    public function setUpdatedOn(\DateTime $updatedOn)
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


}

