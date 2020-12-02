<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector;

use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Expander\DataLayerExpander;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Expander\DataLayerExpanderInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class GoogleTagManagerSessionConnectorFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Expander\DataLayerExpanderInterface
     */
    public function createDataLayerExpander(): DataLayerExpanderInterface
    {
        return new DataLayerExpander($this->getSessionClient());
    }

    /**
     * @return \FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface
     */
    public function getSessionClient(): GoogleTagManagerSessionConnectorToSessionClientInterface
    {
        return $this->getProvidedDependency(GoogleTagManagerSessionConnectorDependencyProvider::SESSION_CLIENT);
    }
}
