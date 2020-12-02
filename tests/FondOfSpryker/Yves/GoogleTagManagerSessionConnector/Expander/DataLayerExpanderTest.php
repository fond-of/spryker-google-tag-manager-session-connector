<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Expander;


use Codeception\Test\Unit;
use FondOfSpryker\Shared\GoogleTagManagerSessionConnector\GoogleTagManagerSessionConnectorConstants;
use FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency\GoogleTagManagerSessionConnectorToSessionClientInterface;

class DataLayerExpanderTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|GoogleTagManagerSessionConnectorToSessionClientInterface
     */
    protected $sessionClientMock;

    /**
     * @var DataLayerExpanderInterface
     */
    protected $expander;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->sessionClientMock = $this->getMockBuilder(GoogleTagManagerSessionConnectorToSessionClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->expander = new DataLayerExpander($this->sessionClientMock);
    }

    /**
     * @return void
     */
    protected function testExpand(): void
    {
        $result = $this->expander->expand('pageType', [], []);

        $this->arrayHasKey(GoogleTagManagerSessionConnectorConstants::FIELD_TRANSACTION_ID, $result);
    }
}
