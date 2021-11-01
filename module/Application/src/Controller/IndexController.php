<?php
declare(strict_types = 1);
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use Application\Service\RecognitionService;
use Application\Entity\ListingsBusinessType;
use Doctrine\ORM\EntityManager;
use General\Service\GeneralService;
use Doctrine\ORM\Query;
use Application\Entity\ListingsSegment;
use General\Entity\Country;
use General\Entity\Zone;
use Application\Entity\ListingBusinessState;
use Application\Entity\ListingsCategory;
use General\Entity\TurnOverTerm;

class IndexController extends AbstractActionController
{

    /**
     *
     * @var GeneralService
     */
    private $genealService;

    /**
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     *
     * @var RecognitionService
     */
    private $recognitionService;

    // private
    public function indexAction()
    {
        $this->recognitionService->implement();
        return new ViewModel(array(
            "countryRoutes" => $this->recognitionService->getCountryRoute()
        ));
    }

    public function getListingBusinessTypeAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $repo = $em->getRepository(ListingsBusinessType::class);
        $data = $repo->createQueryBuilder('s')
            ->select([
            "s"
        ])
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
        $jsonModel->setVariables([
            "data" => $data
        ]);
        return $jsonModel;
    }

    public function getListingBusinessSegmentAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $repo = $em->getRepository(ListingsSegment::class);
        $data = $repo->createQueryBuilder('s')
            ->select([
            "s"
        ])
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
        $jsonModel->setVariables([
            "data" => $data
        ]);
        return $jsonModel;
    }

    public function getBusinessStateAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $repo = $em->getRepository(ListingBusinessState::class);
        $data = $repo->createQueryBuilder("s")
            ->select([
            "s"
        ])
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
        $jsonModel->setVariables([
            "data" => $data
        ]);
        return $jsonModel;
    }

    public function getCountryAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $repo = $em->getRepository(Country::class);
        $data = $repo->createQueryBuilder("s")
            ->select([
            "s"
        ])
            ->getQuery()
            ->setMaxResults(400)
            ->getResult(Query::HYDRATE_ARRAY);
        $jsonModel->setVariables([
            "data" => $data
        ]);
        return $jsonModel;
    }

    public function getZoneAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $id = $this->params()->fromRoute("id", NULL);
        
        $response = $this->getResponse();
        if ($id == NULL) {
            $response->setStatusCode(400);
            $jsonModel->setVariables([
                "error" => "Absent Identifier"
            ]);
        } else {
            $repo = $em->getRepository(Zone::class);
            $data = $repo->createQueryBuilder("s")
                ->select([
                "s"
            ])
                ->where("s.country = :count")
                ->setParameters([
                "count" => $id
            ])
                ->getQuery()
                ->getResult(Query::HYDRATE_ARRAY);
            
            $jsonModel->setVariables([
                "data" => $data
            ]);
        }
        return $jsonModel;
    }

    public function getTurnOverTermAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $repo = $em->getRepository(TurnOverTerm::class);
        $data = $repo->createQueryBuilder("s")
            ->select([
            "s"
        ])
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
        $jsonModel->setVariables([
            "data" => $data
        ]);
        return $jsonModel;
    }

    public function getBaseListingCategoryAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $repo = $em->getRepository(ListingsCategory::class);
        $data = $repo->createQueryBuilder("s")
            ->select([
            "s"
        ])
            ->where("s.parent = :parent")
            ->setParameters([
            "parent" => NULL
        ])
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
        return $jsonModel;
    }

    public function getChildListingCategoryAction()
    {
        $jsonModel = new JsonModel();
        return $jsonModel;
    }

    public function getsAction()
    {
        $viewmodel = new ViewModel();
        return $viewmodel;
    }

    /**
     *
     * @return the $genealService
     */
    public function getGenealService()
    {
        return $this->genealService;
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
     * @return the $recognitionService
     */
    public function getRecognitionService()
    {
        return $this->recognitionService;
    }

    /**
     *
     * @param field_type $genealService            
     */
    public function setGenealService($genealService)
    {
        $this->genealService = $genealService;
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
     * @param field_type $recognitionService            
     */
    public function setRecognitionService($recognitionService)
    {
        $this->recognitionService = $recognitionService;
        return $this;
    }
}
