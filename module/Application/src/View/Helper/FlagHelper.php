<?php

namespace Application\View\Helper;

use Application\Service\RecognitionService;

class FlagHelper extends \Laminas\View\Helper\AbstractHelper
{

    /**
     * @var RecognitionService
     */
    private $recognitionService;

    public function __invoke(){
        $route = $this->recognitionService->getCountryRoute();
        return RecognitionService::getFlags($route[0]);
    }

    /**
     * @param RecognitionService $recognitionService
     */
    public function setRecognitionService(RecognitionService $recognitionService): FlagHelper
    {
        $this->recognitionService = $recognitionService;
        return $this;
    }

    /**
     * @return RecognitionService
     */
    public function getRecognitionService(): RecognitionService
    {
        return $this->recognitionService;
    }




}