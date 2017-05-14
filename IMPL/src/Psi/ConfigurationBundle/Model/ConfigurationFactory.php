<?php
namespace Psi\ConfigurationBundle\Model;

use Psi\ConfigurationBundle\Model\ConfigurationFactoryInterface;
use Psi\ConfigurationBundle\Model\Configuration;
use Psi\ConfigurationBundle\Component\ConfigurationEncrypterInterface;
use Psi\ConfigurationBundle\Component\ConfigurationSerializerInterface;
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
        ObjectManager $entityManager,
        ConfigurationSerializerInterface $serializer,  
        ConfigurationEncrypterInterface $encrypter
    ) {
        $this->entityManager = $entityManager;
        $this->configurationSerializer = $serializer;
        $this->configurationEncrypter = $encrypter;
    }
    
    public function createFromArray($data): ConfigurationInterface
    {
        if(($entity = $this->configurationRepostiroy->findOneBy(['name' => $data['name']])) !== null) {
            return $this->createFromEntity($entity, $data['viewTemplate']);
        }
        
        $entity = new Configuration();
        $entity->setLabel($data['label']);
        $entity->setName($data['name']);
        $entity->setValue($data['value']);
        
        $configuration = $this->createFromEntity($entity, $data['type']);
        $configuration->save();
        return $configuration;
    }

    public function createFromEntity($entity, $type, $viewTemplate): ConfigurationInterface
    {
        return new Configuration(
            $this->entityManager,
            $entity,
            $type,
            $this->configurationSerializer,            
            $this->configurationEncrypter,
            $viewTemplate
        );
    }
}
