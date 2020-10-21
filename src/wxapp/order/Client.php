<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\wxapp\order;

use sansanbus\base\common\Client as sansanbusbasecommonClient;

class Client extends sansanbusbasecommonClient {
    public function __construct($uuid, $authorization, $host){
        parent::__construct($uuid, $authorization, $host);
    }

    /**
     * @param string $orderType
     * @param mixed[] $param
     * @return array
     */
    public function create($orderType, $param){
        return $this->_httpClient->post("/order/v1/" . $orderType . "", $this->_requestHeader, $param);
    }
}
