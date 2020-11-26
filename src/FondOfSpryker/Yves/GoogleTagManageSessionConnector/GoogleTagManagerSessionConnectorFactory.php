<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector;

use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Model\GoogleTagManagerSessionConnectorModel;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Model\GoogleTagManagerSessionConnectorModelInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class GoogleTagManagerSessionConnectorFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Model\GoogleTagManagerSessionConnectorModelInterface
     */
    public function createGoogleTagManagerSessionConnectorModel(): GoogleTagManagerSessionConnectorModelInterface
    {
        return new GoogleTagManagerSessionConnectorModel($this->getSessionClient());
    }

    /**
     * @return \FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface
     */
    public function getSessionClient(): GoogleTagManagerSessionConnectorToSessionClientInterface
    {
        return $this->getProvidedDependency(GoogleTagManagerSessionConnectorDependencyProvider::SESSION_CLIENT);
    }
}
