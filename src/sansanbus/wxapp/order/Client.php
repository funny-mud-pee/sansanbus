<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\wxapp\order;

use sansanbus\base\common\Client as sansanbusbasecommonClient;

class Client extends sansanbusbasecommonClient {

    /**
     * @param string $orderType
     * @param mixed[] $param
     * @return array
     */
    public function calculation($orderType, $param){
        return $this->_httpClient->post("/order/v1/" . $orderType . "/calculation", $param);
    }

    /**
     * @param string $orderType
     * @param mixed[] $param
     * @return array
     */
    public function create($orderType, $param){
        return $this->_httpClient->post("/order/v1/" . $orderType . "", $param);
    }
}
