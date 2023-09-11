<?php

namespace Mn\Openapi;

use Hanson\Foundation\Foundation;

/**
 * Class Dispatch
 *
 * @method array commonReq(String $url, array $params, $httpMethod) 通用请求
 * @method array customerCommonRequest(string $uri, array $params, $requestMethod = "POST") 客户中心通用接口
 * @method array employAliCommonRequest(string $uri, array $params, string $send = "openApi", string $receiver = "CTS", $requestMethod = "POST") 阿里人员中心通用接口
 * @method array employBzCommonRequest(string $uri, array $params, $requestMethod = "POST") 博智人员中心通用接口
 * @method array productCommonRequest(string $uri, array $params, $requestMethod = "POST")商品中心通用接口
 * @method array storeAliCommonRequest(string $uri, array $params, string $send = "openApi", string $receiver = "CTS", $requestMethod = "POST")阿里门店中心通用接口
 * @method array storeBzCommonRequest(string $uri, array $params, $requestMethod = "POST")博智门店中心通用接口
 */
class Dispatch extends Foundation
{
    private $service;

    /**
     * @param $config
     */
    public function __construct(string $service, $config)
    {
        parent::__construct($config);
        $this->service = new $service($config);
    }

    public function __call($name, $arguments)
    {
        return $this->service->{$name}(...$arguments);
    }

}