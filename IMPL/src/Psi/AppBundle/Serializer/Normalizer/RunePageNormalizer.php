<?php
namespace Psi\AppBundle\Serializer\Normalizer;

use Psi\AppBundle\Entity\RunePage;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;

class RunePageNormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    public function denormalize($data, $class, $format = null, array $context = array()): object
    {
        
    }

    public function setDenormalizer(DenormalizerInterface $denormalizer)
    {
        $this->denormalizer = $denormalizer;
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return ($type == RunePage::class && $formate == "json");
    }
}
