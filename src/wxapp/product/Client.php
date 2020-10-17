<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\wxapp\product;

use sansanbus\base\http\Client as sansanbusbasehttpClient;

class Client {
    protected $_httpClient;

    public function __construct($host, $token){
        $this->_httpClient = new sansanbusbasehttpClient($host, $token);
    }

    /**
     * @param mixed[] $param
     * @return array
     */
    public function generatePlaceOrderItem($param){
        // var param: map[string]any = {
        // product_id = 96989,
        // spec_id = 1885,
        // order_quantity = 2
        // };
        return $this->_httpClient->post("/product/v1/ecshop/place-order-item", $param);
    }
}
