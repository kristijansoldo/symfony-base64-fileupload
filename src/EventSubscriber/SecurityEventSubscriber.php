<?php


namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class SecurityEventSubscriber
 *
 * @package App\EventSubscriber
 */
class SecurityEventSubscriber implements EventSubscriberInterface
{
    /**
     * @var ParameterBagInterface
     */
    private $params;

    /**
     * @var array|false|string
     */
    private $appSecret;

    /**
     * @var bool
     */
    private $auth;

    /**
     * SecurityEventSubscriber constructor.
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->params = $parameterBag;
        $this->appSecret = $this->params->get('app_secret');
        $this->auth = filter_var($this->params->get('auth'), FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Subscribe on request event.
     *
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            RequestEvent::class => 'onKernelRequest',
        ];
    }

    /**
     * Get request and check app secret.
     *
     * @param RequestEvent $event
     */
    public function onKernelRequest(RequestEvent $event)
    {
        // If enabled auth
        if (!$this->auth) {
            return;
        }

        // Gets app secret from request
        $appSecret = $event->getRequest()->headers->get('app_secret');

        // If app secret does not exists
        if (is_null($appSecret) || $appSecret != $this->appSecret) {
            throw new UnauthorizedHttpException("Unauthorized!");
        }
    }
}
