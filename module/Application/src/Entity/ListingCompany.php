<?php
namespace Application\Entity;

/**
 * This is the company out for sale
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
     * @ORM\Column(name="")
     * @var string
     */
    private $companyTitle;

    // equivalent to company name
    private $companyProfile;

    private $profileImage;

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

