<?php
namespace Psi\AppBundle\Serializer\NameConverter;

use Psi\AppBundle\Serializer\NameConverter;

class SummonerConverter extends AbstractNameConverter
{

    public function getTranslations()
    {
        return [
            'id' => 'externalId'
        ];
    }
}
