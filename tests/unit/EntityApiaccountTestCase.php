<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Entity\Apiaccount;
use Config\Accucom;

class EntityApiaccountTestCase extends TestCase
{
    protected $a;

    public function setUp()
    {
        $host = Accucom::ACCUCOM_HOST;
        $username = Accucom::ACCUCOM_USER;
        $password = Accucom::ACCUCOM_PASS;
        $this->a = new Apiaccount($host, $username, $password);
    }

    //Host
    public function testExpectedExceptionIsRaisedIfSetHostToZero() {
        $this->expectException(\InvalidArgumentException::class);
        $this->a->setHost(0);
        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetHostToEmptyString() {
        $this->expectException(\InvalidArgumentException::class);
        $this->a->setHost('');
        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetHostToNull() {
        $this->expectException(\InvalidArgumentException::class);
        $this->a->setHost(NULL);
        $this->fail('InvalidArgumentException was not raised');
    }

    //Username
    public function testExpectedExceptionIsRaisedIfSetUsernameToEmptyString() {
        $this->expectException(\InvalidArgumentException::class);
        $this->a->setUsername('');
        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetUsernameToNull() {
        $this->expectException(\InvalidArgumentException::class);
        $this->a->setUsername(NULL);
        $this->fail('InvalidArgumentException was not raised');
    }

    //Password
    public function testExpectedExceptionIsRaisedIfSetPasswordToEmptyString() {
        $this->expectException(\InvalidArgumentException::class);
        $this->a->setPassword('');
        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetPasswordToNull() {
        $this->expectException(\InvalidArgumentException::class);
        $this->a->setUsername(NULL);
        $this->fail('InvalidArgumentException was not raised');
    }

    //All
    public function testInstanceOfApiaccountIsCreatedIfSetHostToWwwDotHostnameDotComAndSetUsernameToThisIsTheUsernameAndSetPasswordToThisIsThePassword() {
        $h = new Apiaccount(Accucom::ACCUCOM_HOST, Accucom::ACCUCOM_USER, Accucom::ACCUCOM_PASS);
        $this->assertInstanceOf(Apiaccount::class, $h);
    }
}