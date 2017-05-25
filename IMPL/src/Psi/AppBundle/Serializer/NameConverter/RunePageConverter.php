<?php
namespace Psi\AppBundle\Serializer\NameConverter;

class RunePageConverter extends AbstractNameConverter
{

    public function getTranslations()
    {
        return [
            'pages' => 'runePages',
            'slots' => 'runes',
            'runeSlotId' => 'slotId',
            'id' => 'externalId'
        ];
    }
}
