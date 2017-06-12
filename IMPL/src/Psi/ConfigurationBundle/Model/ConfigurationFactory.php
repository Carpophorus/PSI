<?php
namespace Psi\ConfigurationBundle\Model;

use Psi\ConfigurationBundle\Model\ConfigurationFactoryInterface;
use Psi\ConfigurationBundle\Model\Configuration;
use Psi\ConfigurationBundle\Component\ConfigurationEncrypterInterface;
use Psi\ConfigurationBundle\Component\ConfigurationSerializerInterface;
use Psi\ConfigurationBundle\Entity\Configuration as ConfigurationEntity;
use Psi\ConfigurationBundle\Provider\ConfigurationOptionProviderInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ConfigurationFactory implements ConfigurationFactoryInterface
{

    /**
     *
     * @var ObjectManager 
     */
    private $entityManager;

    /**
     *
     * @var ConfigurationSerializerInterface 
     */
    private $configurationSerializer;

    /**
     *
     * @var ConfigurationEncrypterInterface 
     */
    private $configurationEncrypter;

    public function __construct(
    ObjectManager $entityManager, ConfigurationSerializerInterface $serializer, ConfigurationEncrypterInterface $encrypter
    )
    {
        $this->entityManager = $entityManager;
        $this->configurationSerializer = $serializer;
        $this->configurationEncrypter = $encrypter;
    }

    public function createFromArray($data): ConfigurationInterface
    {
        if (($entity = $this->entityManager->getRepository(ConfigurationEntity::class)->findOneBy(['name' => $data['name']])) !== null) {
            return $this->createFromEntity($entity, $data['group'], $data['label'], $data['type'], $data['viewTemplate'], $data['value'], $data['options']);
        }

        $entity = new ConfigurationEntity();
        $entity->setName($data['name']);
        $entity->setValue($data['value']);
        $entity->setType($data['type']);

        $configuration = $this->createFromEntity($entity, $data['group'], $data['label'], $data['type'], $data['viewTemplate'], $data['value'], $data['options']);
        $configuration->save();
        return $configuration;
    }

    public function createFromEntity($entity, $group, $label, $type, $viewTemplate, $defaultValue = null, ConfigurationOptionProviderInterface $provider = null): ConfigurationInterface
    {
        return new Configuration(
            $this->entityManager
            , $entity
            , $group
            , $label
            , $type
            , $this->configurationSerializer
            , $this->configurationEncrypter
            , $viewTemplate
            , $defaultValue
            , $provider
        );
    }
}
