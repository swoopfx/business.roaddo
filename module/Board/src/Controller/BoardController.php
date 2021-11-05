<?php
namespace Board\Controller;

use Exception;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use Application\Entity\ListingCompany;
use Laminas\InputFilter\InputFilter;
use General\Service\GeneralService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Application\Entity\Listings;

class BoardController extends \Laminas\Mvc\Controller\AbstractActionController
{

    /**
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     *
     * @var GeneralService
     */
    private $generalService;

    // public func
    public function boardAction()
    {
        $viewmodel = new ViewModel();
        return $viewmodel;
    }

    public function createListingAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function createListingsAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function createCompanyAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function postlistingAction()
    {
        $em = $this->entityManager;
        $jsonModel = new JsonModel();
        $request = $this->getRequest();
        $em = $this->entityManager;
        $response = $this->getResponse();
        if ($request->isPost()) {
            $post = $request->getPost();
            $inputFilter = new InputFilter();
            
            try {
                $listingsEntity = new Listings();
                $em->persist($listingsEntity);
                $em->flush();
            } catch (\Exception $e) {}
        } else {
            $response->setStatusCode(400);
            $jsonModel->setVariables([
                "error" => "Invalid Action"
            ]);
        }
        return $jsonModel;
    }

    public function postcreatecompanyAction()
    {
        $jsonModel = new JsonModel();
        /**
         *
         * @var EntityManager $em
         */
        $em = $this->entityManager;
        $request = $this->getRequest();
        $response = $this->getResponse();
        if ($request->isPost()) {
            $post = $request->getPost();
            $inputFilter = new InputFilter();
            
            $inputFilter->add(array(
                'name' => 'companyTitle',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Company Name is required'
                            )
                        )
                    )
                )
            ));
            
            $inputFilter->add(array(
                'name' => 'companyProfile',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'We need the company profile'
                            )
                        )
                    )
                )
            ));
            // $inputFilter->add(array());
            $inputFilter->setData($post);
            if ($inputFilter->isValid()) {
                $data = $inputFilter->getValues();
                try {
                    $listedCompanyEntity = new ListingCompany();
                    $listedCompanyEntity->setCompanyProfile($data["companyProfile"])
                        ->setCompanyUid(uniqid("lcom"))
                        ->setCompanyTitle($data["companyTitle"])
                        ->setCreatedOn(new \DateTime())
                        ->setIsActive(true)
                        ->setUser($this->identity());
                    
                    $em->persist($listedCompanyEntity);
                    $em->flush();
                    
                    // send email
                    
                    $response->setStatusCode(201);
                    $jsonModel->setVariables([]);
                } catch (\Exception $e) {
                    $response->setStatusCode(400);
                    $jsonModel->setVariables([
                        $e->getMessage()
                    ]);
                }
            }
        } else {
            $response->setStatusCode(400);
            $jsonModel->setVariables([
                "message" => "Not Valid"
            ]);
        }
        return $jsonModel;
    }

    public function getcreatedcompanyAction()
    {
        $jsonModel = new JsonModel();
        $repo = $this->entityManager->getRepository(ListingCompany::class);
        $data = $repo->createQueryBuilder("s")
            ->select([
            "s"
        ])
            ->where("s.user = :user")
            ->andWhere("s.isActive = :active")
            ->setParameters([
            "user" => ($this->identity())->getId(),
            "active" => true
        ])
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
        $jsonModel->setVariables([
            "data" => $data
        ]);
        return $jsonModel;
    }

    public function postcreatelistingAction()
    {
        $jsonModel = new JsonModel();
        $request = $this->getRequest();
        $response = $this->getResponse();
        if ($request->isPost()) {
            $post = $request->getPost();
            $inputFilter = new InputFilter();
            if ($inputFilter->isValid()) {
                
                $jsonModel->setVariables([                    // "data"=>$e
                ]);
            }
        } else {}
        return $jsonModel;
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
     * @return the $generalService
     */
    public function getGeneralService()
    {
        return $this->generalService;
    }

    /**
     *
     * @param \Board\Controller\EntityManager $entityManager            
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     *
     * @param \General\Service\GeneralService $generalService            
     */
    public function setGeneralService($generalService)
    {
        $this->generalService = $generalService;
        return $this;
    }
}