<?php

namespace Mn\Openapi;

use Hanson\Foundation\AbstractAPI;
use Mn\Openapi\Exception\OpenApiDispatchException;

class Api extends AbstractAPI
{


    public $clientId;
    public $secret;
    public $gatewayUrl = "";

    public function __construct(array $config)
    {
        $this->clientId = $config['clientId'];
        $this->secret = $config['secret'];
        $this->gatewayUrl = $config['gatewayUrl'];
    }

    public function getMillisecond()
    {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
    }

    /**
     * @throws
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(string $method, array $params, string $httpMethod = 'POST')
    {
        $t = $this->getMillisecond();
        $headerArr['sign'] = $this->signature($t);
        $headerArr['t'] = $t;
        $headerArr['clientID'] = $this->clientId;
        $jsonData = [];
        $uri = $this->gatewayUrl . $method;
        if ($httpMethod == 'POST') {
            $headerArr['Content-Type'] = 'application/json';
            $jsonData['json'] = $params;
        } else {
            $uri .= "?" . http_build_query($params);
        }
        $option = ['headers' => $headerArr];
        $option = array_merge($option, $jsonData);
        $http = $this->getHttp();
        $response = $http->getClient()->request($httpMethod, $uri, $option);
        $result = json_decode(strval($response->getBody()), true);
        $this->checkErrorAndThrow($result);
        return $result;
    }

    public function checkErrorAndThrow($result)
    {
        if (!$result || !isset($result['success'])) {
            throw new OpenApiDispatchException($result['message'], $result['errorCode']);
        }
    }

    public function signature($t): string
    {
        return strtoupper(md5($this->clientId . $this->secret . $t));
    }


}