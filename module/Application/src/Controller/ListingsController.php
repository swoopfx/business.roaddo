<?php

namespace Application\Controller;

use Application\Entity\BusinessPlan;
use Application\Service\ListingsSearchService;
use Doctrine\ORM\EntityManager;
use General\Service\GeneralService;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class ListingsController extends AbstractActionController
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

    /**
     * @var ListingsSearchService
     */
    private $listingSearchService;

    /**
     * @return ListingsSearchService
     */
    public function getListingSearchService(): ListingsSearchService
    {
        return $this->listingSearchService;
    }

    /**
     * @param ListingsSearchService $listingSearchService
     * @return ListingsController
     */
    public function setListingSearchService(ListingsSearchService $listingSearchService): ListingsController
    {
        $this->listingSearchService = $listingSearchService;
        return $this;
    }

    public function searchAction()
    {
        $viewModel = new ViewModel();
        $q = $this->params()->fromQuery();
        $data["page"] = $q["page"] ?? 1;
        $data["page"] = $q["count"] ?? 20;
        $listingSearchService = $this->listingSearchService;

        $request = $this->getRequest();
        if (count() > 0) {

        } else {

            $listings = $listingSearchService->findAlllisting($data);
        }
        $viewModel->setVariables([
            "data" => $listings
        ]);
        return $viewModel;
    }

    public function listingDetailsAction()
    {

        return $viewwModel;
    }

    public function planAction()
    {
        if ($this->identity()) {
            $this->redirect()->toRoute("board/default", array(
                "controller" => "board",
                "action" => "create-listing"
            ));
        }

        $data = $this->entityManager->getRepository(BusinessPlan::class)->findAll();
        $viewModel = new ViewModel(array(
            'packages' => $data
        ));
        return $viewModel;
    }

    /**
     * @param EntityManager $entityManager
     * @return ListingsController
     */
    public function setEntityManager(EntityManager $entityManager): ListingsController
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    /**
     * @param GeneralService $generalService
     * @return ListingsController
     */
    public function setGeneralService(GeneralService $generalService): ListingsController
    {
        $this->generalService = $generalService;
        return $this;
    }

    /**
     * @return GeneralService
     */
    public function getGeneralService(): GeneralService
    {
        return $this->generalService;
    }


}