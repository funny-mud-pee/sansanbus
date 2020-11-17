<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\base\common;

use sansanbus\base\http\Client as sansanbusbasehttpClient;
use AlibabaCloud\Tea\Utils\Utils;

class Client {
    protected $_httpClient;

    public function __construct($host, $uuid, $authorization){
        if (Utils::empty_($host)) {
            $host = "127.0.0.1";
        }
        $header = [
            "authorization" => $authorization,
            "uuid" => $uuid
        ];
        $this->_httpClient = new sansanbusbasehttpClient($host, $header);
    }
}
