<?php

namespace Mn\Openapi\store;

use Mn\Openapi\Api;

class StoreBz extends Api
{

    /**阿里云门店中心通用接口
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function storeBzCommonRequest(string $uri, array $params, $requestMethod = "POST")
    {
        return $this->request($uri, $params, $requestMethod);
    }

}