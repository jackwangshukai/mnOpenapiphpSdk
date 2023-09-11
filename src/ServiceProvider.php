<?php

namespace Mn\Openapi;

use Mn\Openapi\customer\Customer;
use Mn\Openapi\employ\EmployAli;
use Mn\Openapi\employ\EmployBz;
use Mn\Openapi\product\Product;
use Mn\Openapi\store\StoreAli;
use Mn\Openapi\store\StoreBz;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        // 通用请求
        $pimple['CommonRequest'] = function ($pimple) {
            $config = $pimple->getConfig();
            return new CommonRequest($config);
        };
        // 客户
        $pimple['Customer'] = function ($pimple) {
            $config = $pimple->getConfig();
            return new Customer($config);
        };
        $pimple['EmployAli'] = function ($pimple) {
            $config = $pimple->getConfig();
            return new EmployAli($config);
        };
        $pimple['EmployBz'] = function ($pimple) {
            $config = $pimple->getConfig();
            return new EmployBz($config);
        };
        $pimple['Product'] = function ($pimple) {
            $config = $pimple->getConfig();
            return new Product($config);
        };
        $pimple['StoreAli'] = function ($pimple) {
            $config = $pimple->getConfig();
            return new StoreAli($config);
        };
        $pimple['StoreBz'] = function ($pimple) {
            $config = $pimple->getConfig();
            return new StoreBz($config);
        };
    }
}