<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="listings_category")
 * @author mac
 *        
 */
class ListingsCategory
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
     * @ORM\Column(name="category", type="string", nullable=false)
     * @var string
     */
    private $category;
    
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
     * @return the $category
     */
    public function getCategory()
    {
        return $this->category;
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
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

}

