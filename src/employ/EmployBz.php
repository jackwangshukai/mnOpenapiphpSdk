<?php

namespace Mn\Openapi\employ;

use Mn\Openapi\Api;

class EmployBz extends Api
{

    /**博智门店中心通用接口
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function employBzCommonRequest(string $uri, array $params, $requestMethod = "POST")
    {
        return $this->request($uri, $params, $requestMethod);
    }

}