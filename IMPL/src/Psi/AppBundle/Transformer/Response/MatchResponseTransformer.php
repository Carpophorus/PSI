<?php
namespace Psi\AppBundle\Transformer\Response;

use Psi\AppBundle\Transformer\Response\AbstractResponseTransformer;

class MatchResponseTransformer extends AbstractResponseTransformer
{

    public function getEntityClass(): string
    {
        return "\Psi\AppBundle\Entity\Match";
    }

    public function getEntityMappings(): array
    {
        return [
            'participants' => [
                'entityClass' => "Psi\AppBundle\Entity\Participant",
                'method' => "addParticipant"
            ]
        ];
    }

    public function getFieldMapping(): array
    {
        return [
            'matchId' => "setExternalId"
        ];
    }
}
