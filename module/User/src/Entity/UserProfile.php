<?php
namespace User\Entity;

use Application\Entity\BusinessPlan;
use Doctrine\ORM\Mapping as ORM;
use General\Entity\FileUpload;
use Laminas\Db\Sql\Ddl\Column\Datetime;
use User\Entity\User;


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


    /**
     * @ORM\ManyToOne (targetEntity="General\Entity\FileUpload")
     * @var FileUpload
     */
    private $profileImage;

    /**
     * @ORM\ManyToOne (targetEntity="Application\Entity\BusinessPlan")
     * @var BusinessPlan
     */
    private $package;

    /**
     * @ORM\Column(name="is_package_active", type="boolean", nullable=true)
     * @var boolean
     */
    private $isPackageActive;

    /**
     * @ORM\Column(name="package_expire_date", type="datetime", nullable=true)
     * @var \DateTime
     */
    private $packageExpireDate;

    /**
     * @ORM\OneToOne (targetEntity="User\Entity\User")
     * @var User
     */
    private $user;

    /**
     * @ORM\Column (name="created_on", type="datetime", nullable=false)
     * @var Datetime
     */
    private $createdOn;

    /**
     * @ORM\Column (name="updated_on", type="datetime", nullable=true)
     * @var Datetime
     */
    private $updatedOn;

    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
}

