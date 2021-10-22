<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="listing_franchise_news")
 *
 * @author mac
 *        
 */
class ListingsFranchiseNews
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
     * @ORM\Column(nullable=false)
     *
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(name="contents", type="text", length="16777215", nullable=false)
     *
     * @var string
     */
    private $contents;

    /**
     * @ORM\Column(name="refereal_link", type="string", nullable=true)
     *
     * @var string
     */
    private $referealLink;

    /**
     * @ORM\Column(name="created_on", type="datetime", nullable=false)
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

