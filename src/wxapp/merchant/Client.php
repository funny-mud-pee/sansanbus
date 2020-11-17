<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\wxapp\product;

use sansanbus\base\common\Client as sansanbusbasecommonClient;

class Client extends sansanbusbasecommonClient {

    /**
     * @param mixed[] $param
     * @return array
     */
    public function merchantInfo($param){
        return $this->_httpClient->post("/malls/v1/merchant/info", $param);
    }
}
