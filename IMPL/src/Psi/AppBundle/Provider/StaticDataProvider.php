<?php
namespace Psi\AppBundle\Provider;

use Doctrine\Common\Persistence\ObjectManager;
use Psi\ApiBundle\Request\Factory\RequestFactory;
use Psi\AppBundle\Entity\CacheTag;
use Psi\AppBundle\Entity\Cache;
use Psi\AppBundle\Entity\ChampionCache;
use Psi\ConfigurationBundle\Manager\ConfigurationRegistry;

class StaticDataProvider
{

    const FILE_PROVIDER_URL = "http://ddragon.leagueoflegends.com/cdn/";

    /**
     *
     * @var RequestFactory 
     */
    private $requestFactory;

    /**
     *
     * @var ObjectManager
     */
    private $objectManager;

    /**
     *
     * @var ConfigurationRegistry
     */
    private $configurationRegistry;

    public function __construct(RequestFactory $factory, ObjectManager $objectManager, ConfigurationRegistry $configurationRegistry)
    {
        $this->requestFactory = $factory;
        $this->objectManager = $objectManager;
        $this->configurationRegistry = $configurationRegistry;
    }

    protected function getFileProviderNamespaces()
    {
        return [
            'championImage' => "img/champion"
        ];
    }

    protected function getApiProviderNamespaces()
    {
        return [
            'champion' => 'fetchChampions',
            'rune' => 'fetchRunes',
            'mastery' => 'fetchMasteries',
            'summoner' => 'fetchSummonerSpells',
            'profileicon' => 'fetchSummonerIcons'
        ];
    }

    public function getStaticFileData($namespace, $name, $version = "7.10.1")
    {
        $providerName = $this->getFileProviderNamespaces();
        if (isset($providerName[$namespace])) {
            return file_get_contents(self::FILE_PROVIDER_URL . $version . "/" . $providerName[$namespace] . "/" . $name);
        }
        return null;
    }

    public function fetchStaticData($namespace)
    {
        $methods = $this->getApiProviderNamespaces();
        if (isset($methods[$namespace])) {
            $this->{$methods[$namespace]}();
        }
        return null;
    }

    protected function fetchApiData($apiRequest)
    {
        $apiResponse = $apiRequest->sendRequest()->getResponse();
        $apiData = $apiResponse->getData();

        // check validity of response data
        if (!isset($apiData['data'], $apiData['type'])) {
            return;
        }

        $cacheDuration = $this->configurationRegistry->getConfiguration("psi.app.cache.duration")->getValue();

        foreach ($apiData['data'] as $data) {
            $cacheTagName = $apiData['type'] . "_" . $data['id'];
            $cacheTag = $this->objectManager->getRepository(CacheTag::class)->findOneBy(['tag' => $cacheTagName]);
            if ($cacheTag) {
                $cache = $cacheTag->getCache();
                $cache->setData(serialize($data));
            } else {
                $cache = new Cache();
                $cache->setData(serialize($data));
                $cache->setExpirationTime($cacheDuration); // 7 days

                $cacheTag = new CacheTag();
                $cacheTag->setTag($apiData['type'] . "_" . $data['id']);
                $cacheTag->setCache($cache);
            }

            $this->objectManager->persist($cache);
            $this->objectManager->persist($cacheTag);
        }
        $this->objectManager->flush();
    }

    protected function fetchChampions()
    {
        $apiRequest = $this->requestFactory->createStaticDataChampionsRequest([]);
        $apiResponse = $apiRequest->sendRequest()->getResponse();
        $apiData = $apiResponse->getData();

        // check validity of response data
        if (!isset($apiData['data'], $apiData['type'])) {
            return;
        }
        
        $cacheDuration = $this->configurationRegistry->getConfiguration("psi.app.cache.duration")->getValue();

        foreach ($apiData['data'] as $championData) {

            $cacheTagName = $apiData['type'] . "_" . $championData['id'];
            $cacheTag = $this->objectManager->getRepository(CacheTag::class)->findOneBy(['tag' => $cacheTagName]);
            if ($cacheTag) {
                $cache = $cacheTag->getCache();
                $cache->setData(serialize($championData));
                $this->objectManager->persist($cache);
                $this->objectManager->persist($cacheTag);
            } else {
                $cache = new Cache();
                $cache->setData(serialize($championData));
                $cache->setExpirationTime($cacheDuration); // 7 days

                $cacheTag = new CacheTag();
                $cacheTag->setTag($apiData['type'] . "_" . $championData['id']);
                $cacheTag->setCache($cache);

                $championCache = new ChampionCache();
                $championCache->setCacheTag($cacheTag->getTag());
                $championCache->setChampionId($championData['id']);
                $this->objectManager->persist($cache);
                $this->objectManager->persist($cacheTag);
                $this->objectManager->persist($championCache);
            }
        }
        $this->objectManager->flush();
    }

    protected function fetchRunes()
    {
        $apiRequest = $this->requestFactory->createStaticDataRunesRequest([]);
        $this->fetchApiData($apiRequest);
    }

    protected function fetchMasteries()
    {
        $apiRequest = $this->requestFactory->createStaticDataMasteriesRequest([]);
        $this->fetchApiData($apiRequest);
    }

    protected function fetchSummonerSpells()
    {
        $apiRequest = $this->requestFactory->createStaticDataSummonerSpellsRequest([]);
        $this->fetchApiData($apiRequest);
    }

    protected function fetchSummonerIcons()
    {
        $apiRequest = $this->requestFactory->createStaticDataProfileIconsRequest([]);
        $this->fetchApiData($apiRequest);
    }
}
