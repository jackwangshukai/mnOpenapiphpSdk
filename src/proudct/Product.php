<?php

namespace Mn\Openapi\product;

use Mn\Openapi\Api;

class Product extends Api
{

    /**商品中心中心通用接口
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function productCommonRequest(string $uri, array $params, $requestMethod = "POST")
    {
        return $this->request($uri, $params, $requestMethod);
    }

}