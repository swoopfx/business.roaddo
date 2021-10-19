<?php
namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="file_upload")
 * 
 * @author mac
 *        
 */
class FileUpload
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
     * @ORM\Column(name="image_uid", type="string", nullable=true)
     *
     * @var string
     */
    private $fileUid;

    /**
     * @ORM\Column(name="file_url", type="string", nullable=true)
     *
     * @var string
     */
    private $fileUrl;

    /**
     * This is a lower resolution of Image uploaded
     *
     * @ORM\Column(name="low_resolution", type="string", nullable=true)
     *
     * @var string
     */
    private $lowres;

    /**
     * @ORM\Column(name="thumbnail", type="string", nullable=true)
     *
     * @var string
     */
    private $thumbnail;

    /**
     *
     * @var string @ORM\Column(name="file_name", type="string", length=200, nullable=true)
     */
    private $fileName;

    /**
     *
     * @var boolean @ORM\Column(name="is_hidden", type="boolean", nullable=true)
     */
    private $isHidden;

    /**
     *
     * @var string @ORM\Column(name="mime_type", type="string", length=100, nullable=true)
     */
    private $mimeType;

    /**
     *
     * @var string @ORM\Column(name="file_ext", type="string", length=45, nullable=true)
     */
    private $docExt;

    /**
     * @ORM\Column(name="created_on", type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $createdOn;

    /**
     * @ORM\Column(name="updated_on", type="datetime", nullable=true)
     */
    private $updatedOn;

    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }

    /**
     *
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return the $fileUid
     */
    public function getFileUid()
    {
        return $this->fileUid;
    }

    /**
     *
     * @return the $fileUrl
     */
    public function getFileUrl()
    {
        return $this->fileUrl;
    }

    /**
     *
     * @return the $lowres
     */
    public function getLowres()
    {
        return $this->lowres;
    }

    /**
     *
     * @return the $thumbnail
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     *
     * @return the $fileName
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     *
     * @return the $isHidden
     */
    public function getIsHidden()
    {
        return $this->isHidden;
    }

    /**
     *
     * @return the $mimeType
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     *
     * @return the $docExt
     */
    public function getDocExt()
    {
        return $this->docExt;
    }

    /**
     *
     * @return the $createdOn
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     *
     * @return the $updatedOn
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    /**
     *
     * @param number $id            
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @param string $fileUid            
     */
    public function setFileUid($fileUid)
    {
        $this->fileUid = $fileUid;
        return $this;
    }

    /**
     *
     * @param string $fileUrl            
     */
    public function setFileUrl($fileUrl)
    {
        $this->fileUrl = $fileUrl;
        return $this;
    }

    /**
     *
     * @param string $lowres            
     */
    public function setLowres($lowres)
    {
        $this->lowres = $lowres;
        return $this;
    }

    /**
     *
     * @param string $thumbnail            
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     *
     * @param string $fileName            
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     *
     * @param boolean $isHidden            
     */
    public function setIsHidden($isHidden)
    {
        $this->isHidden = $isHidden;
        return $this;
    }

    /**
     *
     * @param string $mimeType            
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     *
     * @param string $docExt            
     */
    public function setDocExt($docExt)
    {
        $this->docExt = $docExt;
        return $this;
    }

    /**
     *
     * @param DateTime $createdOn            
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     *
     * @param field_type $updatedOn            
     */
    public function setUpdatedOn($updatedOn)
    {
        $this->updatedOn = $updatedOn;
        return $this;
    }
}

