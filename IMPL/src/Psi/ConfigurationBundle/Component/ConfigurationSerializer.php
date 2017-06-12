<?php
// Viktor Galindo - 655/2013
namespace Psi\ConfigurationBundle\Component;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ConfigurationSerializer implements ConfigurationSerializerInterface
{
    
    /**
     * @var Serializer
     */
    private $serializer;
    
    /**
     * @var JsonEncoder 
     */
    private $encoder;
    
    /**
     * @var ObjectNOrmalizer
     */
    private $normalizer;
    
    public function __construct() {
        $this->serializer = new Serializer();
        $this->encoder = new JsonEncoder();
        $this->normalizer = new ObjectNormalizer();
    }
    
    public function serializeValue($value) : string {
        return $this->serializer->serialize($value, 'json');
    }
    
    public function deserializeValue($value) {
        return $this->serializer->deserialize($value, 'array', 'json');
    }
    
    
}
