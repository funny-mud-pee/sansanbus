<?php

// This file is auto-generated, don't edit it. Thanks.
namespace sansanbus\base\http\Models;

use AlibabaCloud\Tea\Model;
use GuzzleHttp\Psr7\Stream;

class RequestOptional extends Model {
    public function validate() {
        Model::validateRequired('header', $this->header, true);
        Model::validateRequired('query', $this->query, true);
        Model::validateRequired('body', $this->body, true);
    }
    public function toMap() {
        $res = [];
        if (null !== $this->header) {
            $res['header'] = $this->header;
        }
        if (null !== $this->query) {
            $res['query'] = $this->query;
        }
        if (null !== $this->body) {
            $res['body'] = $this->body;
        }
        return $res;
    }
    /**
     * @param array $map
     * @return RequestOptional
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['header'])){
            $model->header = $map['header'];
        }
        if(isset($map['query'])){
            $model->query = $map['query'];
        }
        if(isset($map['body'])){
            $model->body = $map['body'];
        }
        return $model;
    }
    /**
     * @var string[]
     */
    public $header;

    /**
     * @var string[]
     */
    public $query;

    /**
     * @var Stream
     */
    public $body;

}
