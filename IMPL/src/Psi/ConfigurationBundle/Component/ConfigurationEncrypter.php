<?php
// Viktor Galindo - 655/2013
namespace Psi\ConfigurationBundle\Component;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

class ConfigurationEncrypter implements ConfigurationEncrypterInterface
{

    /**
     * @var JsonEncoder
     */
    private $encoder;

    public function __construct()
    {
        $this->encoder = new JsonEncoder();
    }

    public function decryptValue($value)
    {
        return $this->encoder->decode(base64_decode($value));
    }

    public function encryptValue($value): string
    {
        return base64_encode($this->encoder->encode($value));
    }
}
