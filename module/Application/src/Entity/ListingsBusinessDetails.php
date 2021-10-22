<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * This is specific information on the business
 * @ORM\Entity
 * @ORM\Table(name="listing_business_details")
 * @author mac
 *        
 */
class ListingsBusinessDetails
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
     * 
     * @var string
     */
    private $askingPrice;
    
    /**
     * @ORM\Column(name="turnover", nullable=true)
     * @var string
     */
    private $turnover;
    
    /**
     * @ORM\Column(name="is_show_turnover", nullable=true)
     * @var string
     */
    private $isShowTurnover;
    
    /**
     * @ORM\ Column(name="net_profit", nullable=true)
     * @var string
     */
    private $netProfit;
    
    /**
     * @ORM\Column(name="is_show_netprofit", type="boolean", nullable=true)
     * @var string
     */
    private $isShowNetprofit;
    
    /**
     * @ORM\Column(name="created_on", type="datetime", nullable=false)
     * @var \DateTime
     */
    private $createdOn;
    
    /**
     * @ORM\Column(name="updated_on", type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedOn;

    /**
     * @ORM\ManyToOne(targetEntity="ListingsBusinessType")
     * @var ListingsBusinessType
     */
    private $businessType;



    
    
//     private $busi
    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
}


