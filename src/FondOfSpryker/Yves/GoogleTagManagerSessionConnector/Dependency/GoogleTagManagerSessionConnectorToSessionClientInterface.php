<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Dependency;

interface GoogleTagManagerSessionConnectorToSessionClientInterface
{
    /**
     * @return string
     */
    public function getId(): string;
}
