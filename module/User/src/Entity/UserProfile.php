<?php
namespace Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="user_profile")
 * @author mac
 *        
 */
class UserProfile
{

    /**
     *
     * @var integer @ORM\Column(name="id", type="integer")
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     *
     */
    private $id;
    
    
    private $fullname; // equivalent to company name
    
    private $profileImage;
    
//     private 
    
    private $createdOn;
    
    private $updatedOn;
    
//     private $
    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
}

