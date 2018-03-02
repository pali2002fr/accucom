<?php

namespace Tests\Functional;

use Entity\Phone;
use Entity\PhoneInterface;
use Config\Database;
use Config\Accucom;
use Model\Record;

class TestApiCachingTestCase extends BaseTestCase
{
    public function testCacheIfIntervalIsNotNull()
    {
        $query = [
            'query' => [
                'areacode' => '617',
                'phone' => '8755813',
                'host' => Accucom::ACCUCOM_HOST,
                'username' => Accucom::ACCUCOM_USER,
                'password' => Accucom::ACCUCOM_PASS,
                'interval' => '1 MINUTE'
            ]
        ];

        $status = $this->http->request('GET', NULL, $query)->getStatusCode();
        $this->assertEquals(200, $status);
        $phone = 617;
        $areacode = 8755813;
        $p = new Phone($phone, $areacode);
        $q = new Record();
        $r = $q->getRecord($p);
        $this->arrayHasKey($r);
        $q->deleteRecord($p);
    }

    public function testCacheIfIntervalIsSetToNo()
    {
        $query = [
            'query' => [
                'areacode' => '617',
                'phone' => '8755813',
                'host' => Accucom::ACCUCOM_HOST,
                'username' => Accucom::ACCUCOM_USER,
                'password' => Accucom::ACCUCOM_PASS,
                'interval' => 'NO'
            ]
        ];

        $status = $this->http->request('GET', NULL, $query)->getStatusCode();
        $this->assertEquals(200, $status);
        $phone = 617;
        $areacode = 8755813;
        $p = new Phone($phone, $areacode);
        $q = new Record();
        $r = $q->getRecord($p);
        $this->assertEmpty($r);
        $q->deleteRecord($p);
    }
}
