<?php

namespace Tests\Functional;

use Config\Accucom;

class TestApiCallTestCase extends BaseTestCase
{


/*
    public function testGet()
    {

        $response = $this->http->request('GET', 'user-agent');
        $this->assertEquals(200, $response->getStatusCode());
        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);
        $userAgent = json_decode($response->getBody())->{"user-agent"};
        $this->assertRegexp('/Guzzle/', $userAgent);
    }
*/    


    public function testAllParamsRight()
    {
        $query = [
            'query' => [
                'areacode' => '617',
                'phone' => '8755813',
                'host' => Accucom::ACCUCOM_HOST,
                'username' => Accucom::ACCUCOM_USER,
                'password' => Accucom::ACCUCOM_PASS,
            ]
        ];

        $statusCode = $this->http->request('GET', NULL, $query)->getStatusCode();
        $this->assertEquals($statusCode, 200);
    }
    

    public function testIfPhoneWrong()
    {
        $query = [
            'query' => [
                'areacode' => '617',
                'phone' => '87558133',
                'host' => Accucom::ACCUCOM_HOST,
                'username' => Accucom::ACCUCOM_USER,
                'password' => Accucom::ACCUCOM_PASS,
            ]
        ];

        $body = $this->http->request('GET', NULL, $query)->getBody();
        $this->assertEquals($body, 'Areacode or/and phone are missing');
    }

    public function testIfAreacodeWrong()
    {
        $query = [
            'query' => [
                'areacode' => '61',
                'phone' => '8755813',
                'host' => Accucom::ACCUCOM_HOST,
                'username' => Accucom::ACCUCOM_USER,
                'password' => Accucom::ACCUCOM_PASS,
            ]
        ];

        $body = $this->http->request('GET', NULL, $query)->getBody();
        $this->assertEquals($body, 'Areacode or/and phone are missing');
    }
}
