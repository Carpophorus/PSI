<?php
// Stefan Erakovic 3086/2016
namespace Psi\AppBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Psi\AppBundle\Manager\StaticFileManagerInterface;
use Psi\AppBundle\Entity\CacheTag;

class StaticDataManager
{

    /**
     *
     * @var StaticFileManagerInterface
     */
    private $fileManager;

    /**
     *
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * In memory cache to reduce DB calls
     * @var array
     */
    private $_cache = [];

    /**
     * In memory file cache to reduce disk file lookups
     * @var array
     */
    protected $_fileCache = [];

    public function __construct(StaticFileManagerInterface $fileManager, ObjectManager $objectManager)
    {
        $this->fileManager = $fileManager;
        $this->objectManager = $objectManager;
    }

    private function getCacheTagname($namespace, $name)
    {
        return $namespace . "_" . $name;
    }

    public function getStaticData($namespace, $name)
    {
        if (isset($this->_cache[$namespace][$name])) {
            return $this->_cache[$namespace][$name];
        }

        $cacheTagName = $this->getCacheTagname($namespace, $name);
        $cacheTag = $this->objectManager->getRepository(CacheTag::class)->findOneBy(['tag' => $cacheTagName]);
        if ($cacheTag) {
            $data = unserialize(stream_get_contents($cacheTag->getCache()->getData()));
            $this->_cache[$namespace][$name] = $data;
            return $data;
        }
    }

    public function updateStaticData($namespace, $name, $data)
    {
        $cacheTagName = $this->getCacheTagname($namespace, $name);
        $cacheTag = $this->objectManager->getRepository(CacheTag::class)->findOneBy(['tag' => $cacheTagName]);
        if ($cacheTag) {
            $cache = $cacheTag->getCache();
            $cache->setData(serialize($data));
            $this->objectManager->persist($cache);
            $this->objectManager->flush();

            $this->_cache[$namespace][$name] = $data;
        }
    }

    public function flushStaticData($namespace, $name = null)
    {
        if (isset($this->_cache[$namespace][$name])) {
            unset($this->_cache[$namespace][$name]);
        }

        if ($name) {
            $cacheTagName = $this->getCacheTagname($namespace, $name);
            $cacheTag = $this->objectManager->getRepository(CacheTag::class)->findOneBy(['tag' => $cacheTagName]);
            if ($cacheTag) {
                $this->objectManager->remove($cacheTag->getCache());
                $this->objectManager->remove($cacheTag);
            }
        } else {
            $select = $this->objectManager->createQuery('SELECT partial ct.{id, cache} FROM Psi\AppBundle\Entity\CacheTag ct WHERE ct.tag LIKE :tagname');
            $select->setParameter('tagname', $this->getCacheTagname($namespace, "%"));
            $result = $select->getResult();

            $removeIds = [];
            foreach ($result as $partialTag) {
                $removeIds[] = $partialTag->getCache()->getId();
            }

            $query = $this->objectManager->createQuery('DELETE FROM Psi\AppBundle\Entity\CacheTag ct WHERE ct.tag LIKE :tagname');
            $query->setParameter('tagname', $this->getCacheTagname($namespace, "%"));
            $query->execute();

            if (count($removeIds) > 0) {
                $query = $this->objectManager->createQuery('DELETE FROM Psi\AppBundle\Entity\Cache c WHERE c.id IN (' . implode(',', $removeIds) . ')');
                $query->execute();
            }
        }
    }

    public function getStaticFileData($namespace, $name)
    {
        if (isset($this->_fileCache[$namespace][$name])) {
            return $this->_fileCache[$namespace][$name];
        }

        $file = $this->fileManager->getFile($namespace, $name);
        $this->_fileCache[$namespace][$name] = $file;
        return $file;
    }

    public function flushStaticFileData($namespace, $name = null)
    {
        if (!$name) {
            unset($this->_fileCache[$namespace]);
            return $this->fileManager->deleteFilesInNamespace($namespace);
        }
        unset($this->_fileCache[$namespace][$name]);
        return $this->fileManager->deleteFile($namespace, $name);
    }
}
