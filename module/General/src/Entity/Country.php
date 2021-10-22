<?php
namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;
use General\Entity\Currency;

/**
 * @ORM\Entity
 * @ORM\Table(name="country")
 *
 * @author mac
 *        
 */
class Country
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
     * @ORM\Column(name="country_name", type="string", nullable=false)
     *
     * @var string
     */
    private $countryName;

    /**
     * @ORM\Column(name="iso_code_2", type="string", nullable=true)
     *
     * @var string
     */
    private $isoCode2;
    
    /**
     * @ORM\Column(name="iso_code_3", type="string", nullable=true)
     *
     * @var string
     */
    private $isoCode3;
    
    /**
     * @ORM\Column(name="address_format", type="text", nullable=true)
     *
     * @var string
     */
    private $addressFormat;
    
    /**
     * @ORM\Column(name="post_code_required", type="boolean", nullable=true)
     *
     * @var boolean
     */
    private $postCodeRequired;
    
    /**
     * @ORM\Column(name="status", type="boolean", nullable=false, options={"default"="1"})
     *
     * @var boolean
     */
    private $status = true;

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }
}

