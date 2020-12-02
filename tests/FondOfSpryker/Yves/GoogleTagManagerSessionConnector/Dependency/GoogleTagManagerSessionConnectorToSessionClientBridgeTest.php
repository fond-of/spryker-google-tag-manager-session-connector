<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency;

use Codeception\Test\Unit;
use Spryker\Client\Session\SessionClientInterface;

class GoogleTagManagerSessionConnectorToSessionClientBridgeTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Session\SessionClientInterface
     */
    protected $sessionClientMock;

    /**
     * @var \FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientBridge
     */
    protected $bridge;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->sessionClientMock = $this->getMockBuilder(SessionClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->bridge = new GoogleTagManagerSessionConnectorToSessionClientBridge($this->sessionClientMock);
    }

    /**
     * @return void
     */
    public function testGedId(): void
    {
        $this->sessionClientMock->expects($this->once())
            ->method('getId')
            ->willReturn('foobar');

        $this->assertEquals('foobar', $this->bridge->getId());
    }
}
