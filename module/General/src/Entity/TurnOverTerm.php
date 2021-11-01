<?php
namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annoually 
 * Quaterly
 * 
 * @ORM\Entity
 * @ORM\Table(name="turn_over_term")
 * @author mac
 *        
 */
class TurnOverTerm
{

    /**
     *
     * @var integer @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     */
    private $id;
    
    /**
     * @ORM\Column(name="term", type="string", nullable=true)
     * @var string
     */
    private $term;
    
    
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
     * @return the $term
     */
    public function getTerm()
    {
        return $this->term;
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
     * @param string $term
     */
    public function setTerm($term)
    {
        $this->term = $term;
        return $this;
    }

}

