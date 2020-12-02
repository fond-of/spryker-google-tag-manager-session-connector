<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Plugin\DataLayer;

use FondOfSpryker\Yves\GoogleTagManagerExtension\Dependency\GoogleTagManagerDataLayerExpanderPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\GoogleTagManagerSessionConnector\GoogleTagManagerSessionConnectorFactory getFactory()
 */
class SessionDataLayerExpanderPlugin extends AbstractPlugin implements GoogleTagManagerDataLayerExpanderPluginInterface
{
    /**
     * @param string $pageType
     * @param array $twigVariableBag
     *
     * @return bool
     */
    public function isApplicable(string $pageType, array $twigVariableBag = []): bool
    {
        return true;
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
        return $this->getFactory()
            ->createDataLayerExpander()
            ->expand($page, $twigVariableBag, $dataLayer);
    }
}
