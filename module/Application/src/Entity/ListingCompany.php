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
     * 
     * @var boolean
     */
    private $isActive;

    private $createdOn;

    private $updatedOn;

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
}

