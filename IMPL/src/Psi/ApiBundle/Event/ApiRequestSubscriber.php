<?php
namespace Psi\ApiBundle\Event;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psi\ApiBundle\Event\ApiRequestCreateEvent;

class ApiRequestSubscriber implements EventSubscriberInterface
{

    /**
     *
     * @var EventDispatcherInterface 
     */
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public static function getSubscribedEvents()
    {
        return array(
            ApiRequestCreateEvent::NAME => 'onRequestCreate',
        );
    }

    public function onRequestCreate(ApiRequestCreateEvent $event)
    {
        $apiRequest = $event->getApiRequest();
        $apiRequest->setEventDispatcher($this->dispatcher);
    }
}
