<?php

namespace Mn\Openapi\customer;

use Mn\Openapi\Api;
use Mn\Openapi\Exception\OpenApiDispatchException;

class Customer extends Api
{

    /**阿里云门店中心通用接口
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function customerCommonRequest(string $uri, array $params, $requestMethod = "POST")
    {
        return $this->request($uri, $params, $requestMethod);
    }



}