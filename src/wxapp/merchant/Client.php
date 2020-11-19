<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\wxapp\merchant;

use sansanbus\base\common\Client as sansanbusbasecommonClient;

class Client extends sansanbusbasecommonClient {

    /**
     * @param string[] $param
     * @return any
     */
    public function index($param){
        return $this->_httpClient->get("/malls/v1/merchant", $param);
    }

    /**
     * @param string[] $param
     * @return any
     */
    public function info($param){
        return $this->_httpClient->get("/malls/v1/merchant/info", $param);
    }
}
