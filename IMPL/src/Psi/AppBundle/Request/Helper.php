<?php
// Stefan Erakovic 3086/2016
namespace Psi\AppBundle\Request;

use Doctrine\ORM\EntityManagerInterface;
use Psi\AppBundle\Manager\ApiResponseManagerInterface;
use Psi\ApiBundle\Request\Factory\RequestFactory;
use Psi\AppBundle\Entity\Summoner;

class Helper
{

    /**
     *
     * @var EntityManagerInterface 
     */
    protected $entityManager;

    /**
     *
     * @var RequestFactory 
     */
    protected $requestFactory;

    /**
     * 
     * @param ApiResponseManagerInterface
     */
    protected $responseManager;

    public function __construct(EntityManagerInterface $entityManager, RequestFactory $requestFactory, ApiResponseManagerInterface $responseManager)
    {
        $this->entityManager = $entityManager;
        $this->requestFactory = $requestFactory;
        $this->responseManager = $responseManager;
    }

    public function getSummonerByName($summonerName)
    {
        $existing = $this->entityManager->getRepository(Summoner::class)->findOneBy(['name' => $summonerName]);
        if ($existing) {
            return $existing;
        }

        $apiRequest = $this->requestFactory->createSummonerRequest([
            "summonerName" => rawurlencode($summonerName)
        ]);

        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();
        $responseData = $apiResponse->getData();

        if (isset($responseData['status']) && $responseData['status']['status_code'] == 404) {
            throw new \Exception("No such summoner exists.");
        }
        
        if(!isset($responseData['id'])) {
            throw new \Exception(print_r([$apiResponse->getHeader(), $responseData], true));
        }

        try {
            $this->entityManager->beginTransaction();
            $summoner = $this->responseManager->processResponse($apiResponse);
            $this->entityManager->persist($summoner);
            $this->entityManager->flush();
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            throw $e;
        }
        return $summoner;
    }

    public function getSummonerRunes($summonerName)
    {
        $summoner = $this->getSummonerByName($summonerName);

        $apiRequest = $this->requestFactory->createRuneRequest([
            "summonerId" => rawurlencode($summoner->getExternalId())
        ]);

        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();
        $responseData = $apiResponse->getData();

        if (isset($responseData['status']) && $responseData['status']['status_code'] == 404) {
            throw new \Exception("Error occured while fetching summoner runes.");
        }

        if (!isset($responseData['pages'])) {
            return ['response' => $apiResponse, 'currentPageId' => null];
        }

        try {
            $this->entityManager->beginTransaction();
            $runePages = $this->responseManager->processResponse($apiResponse);
            foreach ($summoner->getRunePages() as $runePage) {
                $query = $this->entityManager->createQuery('DELETE FROM Psi\AppBundle\Entity\Rune e WHERE e.runePage = :id');
                $query->setParameter('id', $runePage->getId());
                $query->execute();
            }
            $summoner->setRunePages($runePages);
            $this->entityManager->persist($summoner);
            $this->entityManager->flush();
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            throw $e;
        }

        foreach ($responseData['pages'] as $pageData) {
            if ($pageData['current']) {
                $currentRunePageId = $pageData['id'];
            }
        }

        return ['response' => $apiResponse, 'currentPageId' => $currentRunePageId];
    }

    public function getSummonerMasteries($summonerName)
    {
        $summoner = $this->getSummonerByName($summonerName);


        $apiRequest = $this->requestFactory->createMasteryRequest([
            "summonerId" => rawurlencode($summoner->getExternalId())
        ]);

        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();
        $responseData = $apiResponse->getData();

        if (isset($responseData['status']) && $responseData['status']['status_code'] == 404) {
            throw new \Exception("Error occured while fetching summoner masteries.");
        }

        if (!isset($responseData['pages'])) {
            return ['response' => $apiResponse, 'currentPageId' => null];
        }

        try {
            $this->entityManager->beginTransaction();
            $masteryPages = $this->responseManager->processResponse($apiResponse);
            foreach ($summoner->getMasteryPages() as $masteryPage) {
                $query = $this->entityManager->createQuery('DELETE FROM Psi\AppBundle\Entity\Mastery e WHERE e.masteryPage = :id');
                $query->setParameter('id', $masteryPage->getId());
                $query->execute();
            }
            $summoner->setMasteryPages($masteryPages);
            $this->entityManager->persist($summoner);
            $this->entityManager->flush();
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            throw $e;
        }

        foreach ($responseData['pages'] as $pageData) {
            if ($pageData['current']) {
                $currentMasteryPageId = $pageData['id'];
            }
        }

        return ['response' => $apiResponse, 'currentPageId' => $currentMasteryPageId];
    }
}
