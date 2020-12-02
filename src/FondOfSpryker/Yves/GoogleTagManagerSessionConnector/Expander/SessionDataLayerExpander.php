<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Expander;

use FondOfSpryker\Shared\GoogleTagManagerSessionConnector\GoogleTagManagerSessionConnectorConstants;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface;

class SessionDataLayerExpander implements SessionDataLayerExpanderInterface
{
    /**
     * @var \FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface
     */
    protected $sessionClient;

    /**
     * @param \FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface $sessionClient
     */
    public function __construct(GoogleTagManagerSessionConnectorToSessionClientInterface $sessionClient)
    {
        $this->sessionClient = $sessionClient;
    }

    /**
     * @param string $page
     * @param array $twigVariableBag
     * @param array $dataLayer
     *
     * @return array
     */
    public function expand(string $page, array $twigVariableBag, array $dataLayer): array
    {
        $dataLayer[GoogleTagManagerSessionConnectorConstants::FIELD_TRANSACTION_ID] = $this->getSessionId();

        return $dataLayer;
    }

    /**
     * @return string
     */
    protected function getSessionId(): string
    {
        return $this->sessionClient->getId();
    }
}
