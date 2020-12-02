<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector;

use Codeception\Test\Unit;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Expander\DataLayerExpanderInterface;
use Spryker\Yves\Kernel\Container;

class GoogleTagManagerSessionConnectorFactoryTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Yves\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \FondOfSpryker\Yves\GoogleTagManagerSessionConnector\GoogleTagManagerSessionConnectorFactory
     */
    protected $factory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface
     */
    protected $sessionClientMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sessionClientMock = $this->getMockBuilder(GoogleTagManagerSessionConnectorToSessionClientInterface::class)
            ->disableOriginalConstructor()->getMock();

        $this->factory = new GoogleTagManagerSessionConnectorFactory();
        $this->factory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateDataLayerExpander(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->willReturn($this->sessionClientMock);

        $this->assertInstanceOf(
            DataLayerExpanderInterface::class,
            $this->factory->createDataLayerExpander()
        );
    }

    /**
     * @return void
     */
    public function testGetSessionClient(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->willReturn($this->sessionClientMock);

        $this->assertInstanceOf(
            GoogleTagManagerSessionConnectorToSessionClientInterface::class,
            $this->factory->getSessionClient()
        );
    }
}
