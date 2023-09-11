<?php

namespace Mn\Openapi\employ;

use Mn\Openapi\Api;

class EmployAli extends Api
{

    /**阿里云门店中心通用接口
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function employAliCommonRequest(string $uri, array $params, string $send = "openApi", string $receiver = "CTS", $requestMethod = "POST")
    {
        return $this->request($uri, $this->getCommonParams($params, $send, $receiver, $uri), $requestMethod);
    }

    public function getCommonParams($params, $send, $receiver, $uri): ?array
    {
        $data['data'] = $params;
        $data['messageHeader'] = ["interfacePath" => $uri, "messageId" => md5($this->getMillisecond()), "receiver" => $receiver, "sendTime" => date("Y-m-d H:i:s", time()), "sender" => $send];
        return $data;
    }
}