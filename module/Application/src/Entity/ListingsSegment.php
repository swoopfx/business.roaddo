<?php
namespace Application\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="listings_segment")
 * @author mac
 *        
 */
class ListingsSegment
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
     * @ORM\Column(name="segment", type="string", nullable=false)
     * @var string
     */
    private $segment;
    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $segment
     */
    public function getSegment()
    {
        return $this->segment;
    }

    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $segment
     */
    public function setSegment($segment)
    {
        $this->segment = $segment;
        return $this;
    }

}

