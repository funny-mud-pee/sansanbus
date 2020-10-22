<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\wxapp\product;

use sansanbus\base\common\Client as sansanbusbasecommonClient;

class Client extends sansanbusbasecommonClient {
    public function __construct($authorization, $host){
        parent::__construct($authorization, $host);
    }

    /**
     * @param mixed[] $param
     * @return array
     */
    public function generatePlaceOrderItem($param){
        return $this->_httpClient->post("/product/v1/ecshop/place-order-item", $this->_requestHeader, $param);
    }
}
