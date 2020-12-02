<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Plugin\DataLayer;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\GoogleTagManagerSessionConnector\GoogleTagManagerSessionConnectorConstants;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Expander\DataLayerExpanderInterface;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\GoogleTagManagerSessionConnectorFactory;

class SessionDataLayerExpanderPluginExpanderPluginTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Yves\GoogleTagManagerSessionConnector\GoogleTagManagerSessionConnectorFactory
     */
    protected $factoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Expander\DataLayerExpanderInterface
     */
    protected $sessionDataLayerExpanderMock;

    /**
     * @var \FondOfSpryker\Yves\GoogleTagManagerExtension\Dependency\GoogleTagManagerDataLayerExpanderPluginInterface
     */
    protected $plugin;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->factoryMock = $this->getMockBuilder(GoogleTagManagerSessionConnectorFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sessionDataLayerExpanderMock = $this->getMockBuilder(DataLayerExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->plugin = new SessionDataLayerExpanderPlugin();
        $this->plugin->setFactory($this->factoryMock);
    }

    /**
     * @return void
     */
    public function testIsApplicable(): void
    {
        $this->assertIsBool($this->plugin->isApplicable('pageType', []));
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $result = $this->plugin->expand('pageType', [], []);

        $this->arrayHasKey(GoogleTagManagerSessionConnectorConstants::FIELD_TRANSACTION_ID, $result);
    }
}
