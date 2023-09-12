<?php

namespace Mn\Openapi\test;

use Mn\Openapi\CommonRequest;
use Mn\Openapi\Dispatch;
use Mn\Openapi\OpenApiSdk;
use Mn\Openapi\store\StoreBz;
use PHPUnit\Framework\TestCase;
require_once (dirname(__DIR__)) . '/vendor/autoload.php';

class TestSdk extends Testcase
{

    /**
     * 创建订单
     *
     */
    public function testSdk()
    {
        $config = ['clientId' => 'xxx5', 'secret' => 'xx', 'gatewayUrl' => "xxx"];
        $openApiSdk = new OpenApiSdk($config);
        $item = $openApiSdk->CommonRequest;
        $data = [
            'messageHeader' => ["messageId"=>"0e9f163bd55849679586e96e70ce7da0",
                "interfacePath"=>"getStoreInfo","sendTime"=>"2023-04-11 16:06:27","sender"=>"x","receiver"=>"xx"],"data"=>["storeCode"=>"xxx","businessType"=>000]
        ];
        $res=$item->commonReq("/store-center/api/getStoreInfo",$data,"POST");//查询用户信息

    }


    /**
     * 创建订单
     *
     */
    public function testDip()
    {
        $Dispatch = new Dispatch(CommonRequest::class, ["debug"=>false,'clientId' => 'xxxx', 'secret' => 'xxx', 'gatewayUrl' => "xxx"]);
        $data = [
            'messageHeader' => ["messageId"=>"0e9f163bd55849679586e96e70ce7da0",
                "interfacePath"=>"getStoreInfo","sendTime"=>"2023-04-11 16:06:27","sender"=>"xx","receiver"=>"xx"],"data"=>["storeCode"=>"xxx","businessType"=>00]
        ];
        $res=$Dispatch->commonReq("/store-center/api/getStoreInfo",$data,"POST");
        var_dump("wsk",$res);

    }
}