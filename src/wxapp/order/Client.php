<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\wxapp\order;

use sansanbus\base\http\Client as sansanbusbasehttpClient;

class Client {
    protected $_httpClient;

    public function __construct($host, $token){
        $this->_httpClient = new sansanbusbasehttpClient($host, $token);
    }

    /**
     * @param string $orderType
     * @param mixed[] $param
     * @return array
     */
    public function create($orderType, $param){
        return $this->_httpClient->post("/order/v1/${orderType}", $param);
    }
}
