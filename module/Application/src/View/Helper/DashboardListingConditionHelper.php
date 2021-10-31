<?php
namespace Application\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use General\Service\GeneralService;
use Laminas\Authentication\AuthenticationService;
use Laminas\View\Helper\Url;

/**
 *
 * @author mac
 *        
 */
class DashboardListingConditionHelper extends AbstractHelper
{
    
    /**
     * 
     * @var GeneralService
     */
    private $generalService;
    
    /**
     * 
     * @var Url
     */
    private $urlManager;

   
    public function __invoke(){
        $formManager = $this->urlManager->get("Url");
        /**
         * 
         * @var AuthenticationService $auth
         */
        $auth = $this->generalService->getAuth();
//         var_dump($this->urlManager);
        if(!$auth->hasIdentity()){
            $link = $formManager('listings/default', array('action'=>'plan'));
            return "<a href='".$link."' class='btn btn-primary'>Create A Listing</a>";
        }else{
            $link = $formManager("board");
            return "<a href='".$link."' class='btn btn-primary'>Dashboard</a>";
        }
    }
    /**
     * @return the $generalService
     */
    public function getGeneralService()
    {
        return $this->generalService;
    }

    /**
     * @return the $urlManager
     */
    public function getUrlManager()
    {
        return $this->urlManager;
    }

    /**
     * @param \General\Service\GeneralService $generalService
     */
    public function setGeneralService($generalService)
    {
        $this->generalService = $generalService;
        return $this;
    }

    /**
     * @param \Laminas\View\Helper\Url $urlManager
     */
    public function setUrlManager($urlManager)
    {
        $this->urlManager = $urlManager;
        return $this;
    }

   

}

