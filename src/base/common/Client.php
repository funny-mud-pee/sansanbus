<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\base\common;

use sansanbus\base\http\Client as sansanbusbasehttpClient;
use AlibabaCloud\Tea\Utils\Utils;

class Client {
    protected $_httpClient;

    protected $_requestHeader;

    public function __construct($uuid, $authorization, $host){
        if (Utils::empty_($host)) {
            $host = "127.0.0.1";
        }
        $this->_httpClient = new sansanbusbasehttpClient($host);
        $header = [
            "authorization" => $authorization,
            "uuid" => $uuid
        ];
        $this->_requestHeader = $header;
    }
}
