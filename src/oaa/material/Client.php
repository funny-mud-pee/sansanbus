<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\oaa\material;

use sansanbus\base\common\Client as sansanbusbasecommonClient;

class Client extends sansanbusbasecommonClient {

    /**
     * @param mixed[] $param
     * @return array
     */
    public function upload($param){
        return $this->_httpClient->post("/admin.php/api/v1/material/files", $param);
    }
}
