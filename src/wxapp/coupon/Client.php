<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\wxapp\coupon;

use sansanbus\base\common\Client as sansanbusbasecommonClient;

class Client extends sansanbusbasecommonClient {

    /**
     * @param string $code
     * @return any
     */
    public function codeDetail($code){
        $query = [
            "code" => $code
        ];
        return $this->_httpClient->get("/card/v1/coupon/code/detail", $query);
    }

    /**
     * @param string[] $param
     * @return any
     */
    public function userCodeRender($param){
        return $this->_httpClient->post("/card/v1/coupon/user/code/render", $param);
    }
}
