<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Model;

use FondOfSpryker\Shared\GoogleTagManagerSessionConnector\GoogleTagManagerSessionConnectorConstants;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface;

class GoogleTagManagerSessionConnectorModel implements GoogleTagManagerSessionConnectorModelInterface
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
     * @param array $params
     *
     * @return array
     */
    public function getTransactionId(string $page, array $params): array
    {
        return [
            GoogleTagManagerSessionConnectorConstants::FIELD_TRANSACTION_ID => $this->sessionClient->getId(),
        ];
    }
}
