<?php

namespace Mn\Openapi;

class CommonRequest extends Api
{

    /**请求openapi主数据接口
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function commonReq(String $url, array $params, $httpMethod)
    {
        return $this->request($url, $params, $httpMethod);
    }
}