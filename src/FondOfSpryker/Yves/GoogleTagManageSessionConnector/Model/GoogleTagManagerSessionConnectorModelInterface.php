<?php

namespace FondOfSpryker\Yves\GoogleTagManagerSessionConnector\Model;

interface GoogleTagManagerSessionConnectorModelInterface
{
    /**
     * @param string $page
     * @param array $params
     *
     * @return array
     */
    public function getTransactionId(string $page, array $params): array;
}
