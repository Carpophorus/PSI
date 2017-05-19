<?php
namespace Psi\AppBundle\Serializer\NameConverter;

class MatchConverter extends AbstractNameConverter
{

    public function getTranslations()
    {
        return [
            'id' => 'externalId'
        ];
    }
}
