<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency;

use Spryker\Client\Session\SessionClientInterface;

class GoogleTagManagerSessionConnectorToSessionClientBridge implements GoogleTagManagerSessionConnectorToSessionClientInterface
{
    /**
     * @var \Spryker\Client\Session\SessionClientInterface
     */
    protected $sessionClient;

    /**
     * @param \Spryker\Client\Session\SessionClientInterface $sessionClient
     */
    public function __construct(SessionClientInterface $sessionClient)
    {
        $this->sessionClient = $sessionClient;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->sessionClient->getId();
    }
}
