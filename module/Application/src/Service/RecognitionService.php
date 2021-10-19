<?php
namespace Application\Service;

use General\Service\GeneralService;
use Doctrine\ORM\EntityManager;
use Laminas\Session\Container;
use Laminas\Http\Client;
use Laminas\Http\Request;
use Laminas\Json\Json;
use Laminas\Http\PhpEnvironment\RemoteAddress;

/**
 *
 * @author mac
 *        
 */
class RecognitionService
{

    /**
     *
     * @var GeneralService
     */
    private $generalService;

    /**
     *
     * @var unknown
     */
    private $url;

    /**
     *
     * @var array
     */
    private $countryRoute;

    private $requestObject;

    // private $
    
    /**
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     *
     * @var Container
     */
    private $countryRouteSession;

    // private
    
    /**
     */
    public function __construct()
    {
        
        // TODO - Insert your code here
    }

    public function implement()
    {
        $ip = $this->getIPAddress();
        
        $ip = "197.210.45.47";
        $details = $this->getIpDetails($ip);
        
        $countryRoute = [];
        array_push($countryRoute, $details->country_code);
        $this->setCountryRoute($countryRoute);
    }

    private function condition()
    {
        if (count($this->getCountryRoute()) == 0) {}
    }

    private function getIPAddress()
    {
        $remoteEnv = new RemoteAddress();
        return $remoteEnv->getIpAddress();
    }

    private function getIpDetails($ip)
    {
        if ($ip != NULL) {
            $client = new Client();
            $endpoint = "http://ipwhois.app/json/{$ip}";
            $response = $client->setMethod(Request::METHOD_GET)
                ->setUri($endpoint)
                ->send();
            if ($response->isSuccess()) {
                
                return Json::decode($response->getBody());
            }
        } else {
            throw new \Exception("No Ip Address");
        }
    }

    /**
     *
     * @return the $generalService
     */
    public function getGeneralService()
    {
        return $this->generalService;
    }

    /**
     *
     * @return the $entityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     *
     * @param field_type $generalService            
     */
    public function setGeneralService($generalService)
    {
        $this->generalService = $generalService;
        return $this;
    }

    /**
     *
     * @param field_type $entityManager            
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     *
     * @return the $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     *
     * @return the $requestObject
     */
    public function getRequestObject()
    {
        return $this->requestObject;
    }

    /**
     *
     * @param \Service\unknown $url            
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     *
     * @param field_type $requestObject            
     */
    public function setRequestObject($requestObject)
    {
        $this->requestObject = $requestObject;
        return $this;
    }

    /**
     *
     * @return the $countryRouteSession
     */
    public function getCountryRouteSession()
    {
        return $this->countryRouteSession;
    }

    /**
     *
     * @param \Laminas\Session\Container $countryRouteSession            
     */
    public function setCountryRouteSession($countryRouteSession)
    {
        $this->countryRouteSession = $countryRouteSession;
        return $this;
    }

    /**
     *
     * @return the $countryRoute
     */
    public function getCountryRoute()
    {
        return $this->countryRouteSession->countryRoute;
    }

    /**
     *
     * @param array $countryRoute            
     */
    public function setCountryRoute(array $countryRoute)
    {
        $this->countryRouteSession->countryRoute = $countryRoute;
        return $this;
    }
}

