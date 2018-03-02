<?php

namespace Tests\Functional;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Config\Api;

abstract class BaseTestCase extends TestCase
{
    protected $http;

    protected function setUp()
    {
        $this->http = new Client([
            'base_uri' => Api::API_HOST
        ]);
    }

    protected function tearDown()
    {
        $this->http = null;
    }
}

