<?php
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
        $cacheTagName = $this->getCacheTagname($namespace, $name);
        $cacheTag = $this->objectManager->getRepository(CacheTag::class)->findOneBy(['tag' => $cacheTagName]);
        if ($cacheTag) {
            $data = unserialize($cacheTag->getCache()->getData());
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
        }
    }

    public function flushStaticData($namespace, $name = null)
    {
        if ($name) {
            $cacheTagName = $this->getCacheTagname($namespace, $name);
            $cacheTag = $this->objectManager->getRepository(CacheTag::class)->findOneBy(['tag' => $cacheTagName]);
            if ($cacheTag) {
                $this->objectManager->remove($cacheTag);
            }
        } else {
            $query = $this->objectManager->createQuery('DELETE FROM Psi\AppBundle\Entity\CacheTag ct WHERE ct.tag LIKE :tagname');
            $query->setParameter('tagname', $this->getCacheTagname($namespace, "%"));
            $query->execute();
        }
    }

    public function getStaticFileData($namespace, $name)
    {
        $file = $this->fileManager->getFile($namespace, $name);
        return $file;
    }

    public function flushStaticFileData($namespace, $name = null)
    {
        if (!$name) {
            return $this->fileManager->deleteFilesInNamespace($namespace);
        }
        return $this->fileManager->deleteFile($namespace, $name);
    }
}
