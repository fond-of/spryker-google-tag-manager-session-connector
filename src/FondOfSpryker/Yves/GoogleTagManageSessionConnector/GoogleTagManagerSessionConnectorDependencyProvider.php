<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector;

use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientBridge;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class GoogleTagManagerSessionConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    public const SESSION_CLIENT = 'SESSION_CLIENT';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = $this->addSessionClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function addSessionClient(Container $container): Container
    {
        $container->set(static::SESSION_CLIENT, static function (Container $container) {
            return new GoogleTagManagerSessionConnectorToSessionClientBridge(
                $container->getLocator()->session()->client()
            );
        });

        return $container;
    }
}
