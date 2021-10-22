<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="listings_franchise_video")
 * 
 * @author mac
 *        
 */
class ListingsFranchiseVideos
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
    private $video1;

    /**
     * @ORM\Column(nullable=true)
     * 
     * @var string
     */
    private $video2;

    /**
     * @ORM\Column(nullable=true)
     * 
     * @var string
     */
    private $video3;

    /**
     * @ORM\Column(type="datetime", nullable=false, name="created_on")
     * 
     * @var string
     */
    private $createdOn;

    /**
     * @ORM\Column(type="datetime", nullable=true, name="updated_on")
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

