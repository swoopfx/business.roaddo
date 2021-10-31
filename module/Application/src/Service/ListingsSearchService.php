<?php
namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use General\Service\GeneralService;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Laminas\Paginator\Paginator;
use Application\Entity\Listings;

class ListingsSearchService
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
     * This gets a result of all listing search from the database
     * 
     * @return array
     */
    public function search()
    {
        $em = $this->entityManager;
        $result = [];
        return $result;
    }

    public function findAlllisting($data)
    {
        $em = $this->entityManager;
        $repo = $em->getRepository(Listings::class);
        $query = $repo->createQueryBuilder("s")
            ->select([
            "s"
        ])
            ->where("s.isActive = :active")
            ->setParameters([
                "active"=>true
            ])
            ->orderBy("s.id", "DESC")->getQuery()->setHydrationMode(Query::HYDRATE_ARRAY);
        $adapter = new DoctrineAdapter(new ORMPaginator($query));
        $paginator = new Paginator($adapter);
        $paginator->setItemCountPerPage($data["count"])->setCurrentPageNumber($data["page"]);
        return $data;
    }

    public function listingDetails()
    {}

    /**
     *
     * @param EntityManager $entityManager            
     * @return ListingsSearchService
     */
    public function setEntityManager(EntityManager $entityManager): ListingsSearchService
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     *
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    /**
     *
     * @param GeneralService $generalService            
     * @return ListingsSearchService
     */
    public function setGeneralService(GeneralService $generalService): ListingsSearchService
    {
        $this->generalService = $generalService;
        return $this;
    }

    /**
     *
     * @return GeneralService
     */
    public function getGeneralService(): GeneralService
    {
        return $this->generalService;
    }
}