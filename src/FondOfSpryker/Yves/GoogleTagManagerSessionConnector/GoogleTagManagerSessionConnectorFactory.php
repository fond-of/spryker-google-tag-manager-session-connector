<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector;

use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Expander\SessionDataLayerExpander;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Expander\SessionDataLayerExpanderInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class GoogleTagManagerSessionConnectorFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Expander\SessionDataLayerExpanderInterface
     */
    public function createSessionDataLayerExpander(): SessionDataLayerExpanderInterface
    {
        return new SessionDataLayerExpander($this->getSessionClient());
    }

    /**
     * @return \FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface
     */
    public function getSessionClient(): GoogleTagManagerSessionConnectorToSessionClientInterface
    {
        return $this->getProvidedDependency(GoogleTagManagerSessionConnectorDependencyProvider::SESSION_CLIENT);
    }
}
