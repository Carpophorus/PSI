<?php
namespace Psi\ConfigurationBundle\Model;

use Psi\ConfigurationBundle\Component\ConfigurationEncrypterInterface;
use Psi\ConfigurationBundle\Component\ConfigurationSerializerInterface;
use Psi\ConfigurationBundle\Entity\Configuration as ConfigurationEntity;
use Doctrine\Common\Persistence\ObjectManager;
use Psi\ConfigurationBundle\Provider\ConfigurationOptionProviderInterface;


class Configuration implements ConfigurationInterface
{

    /**
     * Supported configuration value types
     */
    const TYPE_SERIALIZED = "serialized";
    const TYPE_ENCRYPTED = "encrypted";
    const TYPE_RAW = "raw";

    /**
     * Underlying entity object
     * @var \Psi\ConfigurationBundle\Entity\Configuration 
     */
    private $entity;

    /**
     * Configuration group
     * @var string
     */
    private $group;

    /**
     * Entity manager used for persisting the configuration object
     * @var Doctrine\Common\Persistence\ObjectManager
     */
    private $entityManager;

    /**
     * Configuration value type indicator
     * @var string
     */
    private $type;

    /**
     * Serializer used for serialized values
     * @var ConfigurationSerializerInterface
     */
    private $serializer;

    /**
     * Encrzpter used for encrypted values
     * @var ConfigurationEncrypterInterface
     */
    private $encrypter;

    /**
     * Configuration default value
     * @var mixed
     */
    private $defaultValue;

    /**
     * Configuration view template
     * @var string
     */
    private $viewTemplate;

    /**
     * Persistence indicator
     * @var boolean 
     */
    private $_persisted;
    
    /**
     *
     * @var ConfigurationOptionProviderInterface
     */
    private $provider;

    /**
     * 
     * @param ObjectManager $entityManager
     * @param ConfigurationEntity $entity
     * @param string $group
     * @param string $type
     * @param ConfigurationSerializerInterface $serializer
     * @param ConfigurationEncrypterInterface $encrypter
     * @param string $viewTemplate
     * @param string $defaultValue
     * @param ConfigurationOptionProviderInterface $options
     */
    public function __construct(
    ObjectManager $entityManager, ConfigurationEntity $entity, $group, $label, $type, ConfigurationSerializerInterface $serializer, ConfigurationEncrypterInterface $encrypter, $viewTemplate, $defaultValue = null, ConfigurationOptionProviderInterface $provider = null
    )
    {
        $this->entityManager = $entityManager;
        $this->entity = $entity;
        $this->group = $group;
        $this->label = $label;
        $this->type = $type;
        $this->serializer = $serializer;
        $this->encrypter = $encrypter;
        $this->viewTemplate = $viewTemplate;
        $this->defaultValue = $defaultValue;
        $this->provider = $provider;
    }

    /**
     * Persist the underlying entity in preparation for save
     * @return $this
     */
    public function persist()
    {
        $this->entityManager->persist($this->entity);
        $this->_persisted = true;
        return $this;
    }

    /**
     * Saves the configuration to the underlying database layer
     * @return $this
     */
    public function save()
    {
        if (!$this->_persisted) {
            $this->persist();
        }
        $this->entityManager->flush();
        $this->_persisted = false;

        return $this;
    }

    /**
     * Returns configuration group
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * Returns configuration internal name
     * @return string
     */
    public function getName(): string
    {
        return $this->entity->getName();
    }

    /**
     * Returns configuration label
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Returns configuration value
     * @return mixed
     * @throws \Exception
     */
    public function getValue()
    {
        if (!$this->entity->getValue()) {
            return $this->getDefaultValue();
        }

        $value = $this->entity->getValue();
        switch ($this->type) {
            case self::TYPE_SERIALIZED:
                $value = $this->serializer->unserialize($value);
                break;
            case self::TYPE_ENCRYPTED:
                $value = $this->encrypter->decrypt($value);
                break;
            case self::TYPE_RAW:
                break;
            default:
                throw new \Exception("Invalid configuration type.");
        }
        return $value;
    }

    /**
     * Sets the configuration value
     * @param mixed $value
     */
    public function setValue($value)
    {
        switch ($this->type) {
            case self::TYPE_SERIALIZED:
                $value = $this->serializer->serialize($value);
                break;
            case self::TYPE_ENCRYPTED:
                $value = $this->encrypter->encrypt($value);
                break;
            case self::TYPE_RAW:
                break;
            default:
                throw new Exception("Invalid configuration type.");
        }
        $this->entity->setValue($value);
        return $this;
    }

    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    public function getViewTemplate(): string
    {
        return $this->viewTemplate;
    }

    public function getOptions(): array
    {
        return $this->provider->getOptions();
    }
}
