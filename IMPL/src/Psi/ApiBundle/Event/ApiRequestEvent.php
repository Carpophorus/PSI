<?php
namespace Psi\ApiBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Psi\ApiBundle\Request\AbstractRequest;

class ApiRequestEvent extends Event
{

    const NAME = "psi.api.event.request";
    
    /**
     *
     * @var AbstractRequest
     */
    protected $request;

    public function __construct(AbstractRequest $request)
    {
        $this->request = $request;
    }

    public function getApiRequest()
    {
        return $this->request;
    }
}
