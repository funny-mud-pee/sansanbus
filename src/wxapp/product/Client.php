<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\wxapp\product;

use sansanbus\base\common\Client as sansanbusbasecommonClient;

class Client extends sansanbusbasecommonClient {

    /**
     * @param mixed[] $param
     * @return any
     */
    public function generatePlaceOrderItem($param){
        return $this->_httpClient->post("/product/v1/ecshop/place-order-item", $param);
    }
}
