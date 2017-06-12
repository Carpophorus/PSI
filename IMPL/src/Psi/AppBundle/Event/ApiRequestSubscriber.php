<?php
// Stefan Erakovic 3086/2016
namespace Psi\AppBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psi\ApiBundle\Event\ApiRequestEvent;
use Psi\ConfigurationBundle\Manager\ConfigurationRegistry;

class ApiRequestSubscriber implements EventSubscriberInterface
{

    /**
     *
     * @var ConfigurationRegistry
     */
    protected $configurationRegistry;

    public function __construct(ConfigurationRegistry $configurationRegistry)
    {
        $this->configurationRegistry = $configurationRegistry;
    }

    public static function getSubscribedEvents()
    {
        return array(
            ApiRequestEvent::NAME . "_send_before" => 'onRequestSendBefore',
            ApiRequestEvent::NAME . "_send_after" => 'onRequestSendAfter',
        );
    }

    public function onRequestSendBefore(ApiRequestEvent $event)
    {
        $apiRequest = $event->getApiRequest();

        $apiConfig = $this->configurationRegistry->getConfiguration('psi.app.api.delay');

        if ($apiConfig->getValue() > 0) {
            sleep($apiConfig->getValue());
        }
    }

    public function onRequestSendAfter(ApiRequestEvent $event)
    {
        $apiRequest = $event->getApiRequest();
    }
}
