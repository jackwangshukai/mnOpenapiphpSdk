<?php

namespace Mn\Openapi;

use Hanson\Foundation\Foundation;

class OpenApiSdk extends Foundation
{
    protected $providers = [
        ServiceProvider::class
    ];

    public function __construct($config)
    {
        $config['debug'] = $config['debug'] ?? false;
        parent::__construct($config);
    }

}