<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\Entity\FranchiseSector;

/**
 * @ORM\Entity
 * @ORM\Table(name="listing_franchise_details")
 * 
 * @author mac
 *        
 */
class ListingsFranchiseDetails
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
     * @ORM\ManyToOne(targetEntity="General\Entity\FranchiseSector")
     * @var FranchiseSector
     */
    private $franchiseSector;
    
    /**
     * 
     * @var unknown
     */
    private $franchiseNews;
    
    private $franchiseVideo;
    
    private $franchiseLowerInvestment;
    
    private $franchiseHigerBound;
    
    private $franchiseExpectedInvestment;
    
    private $createdOn;
    
    private $updatedOn;
    
    

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
}

