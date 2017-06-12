<?php
// Nemanja Djokic - 496/2013

namespace Psi\AppBundle\Request;

use Psi\ApiBundle\Request\AuthenticationInterface;

class StaticAuthentication implements AuthenticationInterface
{

    public function getApiKey(): string
    {
        return "RGAPI-d9557cf9-c00f-4440-890d-99a92f618c0b";
    }
}
