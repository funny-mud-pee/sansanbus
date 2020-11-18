<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\base\http;

use AlibabaCloud\Tea\Tea;
use AlibabaCloud\Tea\Request;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Tea\Exception\TeaError;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaUnableRetryError;

use sansanbus\base\http\Models\RequestOptional;

class Client {
    protected $_optionals;

    public function __construct($endpoint, $headers){
        $header = [
            "host" => $endpoint,
            "content-type" => "application/json",
            "authorization" => @$headers["authorization"],
            "uuid" => @$headers["uuid"]
        ];
        $query = [];
        $body = "";
        $this->_optionals = new RequestOptional([
            "header" => $header,
            "query" => $query,
            "body" => $body
        ]);
    }

    /**
     * @param string $method
     * @param string $path
     * @return array
     * @throws TeaError
     * @throws Exception
     * @throws TeaUnableRetryError
     */
    public function request($method, $path){
        $_runtime = [
            // 描述运行时参数
            "timeouted" => "retry",
            "retry" => [
                "retryable" => true,
                "maxAttempts" => 3
            ],
            "ignoreSSL" => true
        ];
        $_lastRequest = null;
        $_lastException = null;
        $_now = time();
        $_retryTimes = 0;
        while (Tea::allowRetry(@$_runtime["retry"], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime(@$_runtime["backoff"], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;
            try {
                $_request = new Request();
                // 描述请求相关信息
                $_request->protocol = "http";
                $_request->method = $method;
                $_request->pathname = $path;
                $_request->headers = $_optionals->header;
                $_request->query = $_optionals->query;
                $_request->body = $_optionals->body;
                $_lastRequest = $_request;
                $_response= Tea::send($_request, $_runtime);
                // 描述返回相关信息
                if (!Utils::equalNumber($_response->statusCode, 200)) {
                    throw new TeaError([
                        "message" => "" . $_response->statusMessage . "",
                        "code" => "" . (string) ($_response->statusCode) . ""
                    ]);
                }
                $result = Utils::assertAsMap(Utils::readAsJSON($_response->body));
                return $result;
            }
            catch (Exception $e) {
                if (!($e instanceof TeaError)) {
                    $e = new TeaError([], $e->getMessage(), $e->getCode(), $e);
                }
                if (Tea::isRetryable($e)) {
                    $_lastException = $e;
                    continue;
                }
                throw $e;
            }
        }
        throw new TeaUnableRetryError($_lastRequest, $_lastException);
    }

    /**
     * @param string $path
     * @param string[] $query
     * @return array
     */
    public function get($path, $query){
        $_optionals->query = $query;
        return $this->request("GET", $path);
    }

    /**
     * @param string $path
     * @param mixed[] $formData
     * @return array
     */
    public function post($path, $formData){
        $body = Utils::toJSONString($formData);
        $_optionals->body = $body;
        return $this->request("POST", $path);
    }
}
