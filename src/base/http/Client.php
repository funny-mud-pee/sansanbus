<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\base\http;

use AlibabaCloud\Tea\Exception\TeaError;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaUnableRetryError;
use AlibabaCloud\Tea\Tea;
use AlibabaCloud\Tea\Request;
use AlibabaCloud\Tea\Utils\Utils;

use sansanbus\base\http\Models\RequestOptional;

class Client {
    protected $_endpoint;

    protected $_uuid;

    protected $_authorization;

    public function __construct($endpoint, $headers){
        $this->_endpoint = $endpoint;
        $this->_uuid = @$headers["uuid"];
        $this->_authorization = @$headers["authorization"];
    }

    /**
     * @param string $method
     * @param string $path
     * @param RequestOptional $optionals
     * @return any
     * @throws TeaError
     * @throws Exception
     * @throws TeaUnableRetryError
     */
    public function request($method, $path, $optionals){
        $optionals->validate();
        $_runtime = [
            "timeouted" => "retry",
            "retry" => [
                "retryable" => true,
                "maxAttempts" => 3
            ],
            "ignoreSSL" => true,
            "backoff" => [
                "policy" => "yes",
                "period" => 1
            ]
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
                $_request->protocol = "https";
                $_request->method = $method;
                $_request->pathname = $path;
                $_request->headers = [
                    "host" => $this->_endpoint,
                    "content-type" => "application/json",
                    "authorization" => $this->_authorization,
                    "uuid" => $this->_uuid
                ];
                $_request->query = $optionals->query;
                $_request->body = $optionals->body;
                $_lastRequest = $_request;
                $_response= Tea::send($_request, $_runtime);
                $data = Utils::assertAsMap(Utils::readAsJSON($_response->body));
                if (!Utils::equalNumber($_response->statusCode, 200)) {
                    throw new TeaError([
                        "message" => @$data["msg"],
                        "code" => @$data["code"]
                    ]);
                }
                return @$data["result"];
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
     * @return any
     */
    public function get($path, $query){
        $body = "";
        $optionals = new RequestOptional([
            "query" => $query,
            "body" => $body
        ]);
        return $this->request("GET", $path, $optionals);
    }

    /**
     * @param string $path
     * @param mixed[] $formData
     * @return any
     */
    public function post($path, $formData){
        $query = [];
        $body = Utils::toJSONString($formData);
        $optionals = new RequestOptional([
            "query" => $query,
            "body" => $body
        ]);
        return $this->request("POST", $path, $optionals);
    }
}
