<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Entity\Apiaccount;

class EntityApiaccountTestCase extends TestCase
{
    //Host
    public function testExpectedExceptionIsRaisedIfSetHostToZero() {
        $this->expectException(\InvalidArgumentException::class);
        $host = 0;
        $username = 'thisIsTheUsername';
        $password = 'thisIsThePassword';
        $h = new Apiaccount($host, $username, $password);

        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetHostToEmptyString() {
        $this->expectException(\InvalidArgumentException::class);
        $host = '';
        $username = 'thisIsTheUsername';
        $password = 'thisIsThePassword';
        $h = new Apiaccount($host, $username, $password);

    	$this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetHostToNull() {
        $this->expectException(\InvalidArgumentException::class);
        $host = NULL;
        $username = 'thisIsTheUsername';
        $password = 'thisIsThePassword';
        $h = new Apiaccount($host, $username, $password);

        $this->fail('InvalidArgumentException was not raised');
    }

    //Username
    public function testExpectedExceptionIsRaisedIfSetUsernameToEmptyString() {
        $this->expectException(\InvalidArgumentException::class);
        $host = 'http://www.hostname.com';
        $username = '';
        $password = 'thisIsThePassword';
        $h = new Apiaccount($host, $username, $password);

        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetUsernameToNull() {
        $this->expectException(\InvalidArgumentException::class);
        $host = 'http://www.hostname.com';
        $username = NULL;
        $password = 'thisIsThePassword';
        $h = new Apiaccount($host, $username, $password);

        $this->fail('InvalidArgumentException was not raised');
    }

    //Password
    public function testExpectedExceptionIsRaisedIfSetPasswordToEmptyString() {
        $this->expectException(\InvalidArgumentException::class);
        $host = 'http://www.hostname.com';
        $username = 'thisIsTheUsername';
        $password = '';
        $h = new Apiaccount($host, $username, $password);

        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetPasswordToNull() {
        $this->expectException(\InvalidArgumentException::class);
        $host = 'http://www.hostname.com';
        $username = 'thisIsTheUsername';
        $password = NULL;
        $h = new Apiaccount($host, $username, $password);

        $this->fail('InvalidArgumentException was not raised');
    }

    //All
    public function testInstanceOfApiaccountIsCreatedIfSetHostToWwwDotHostnameDotComAndSetUsernameToThisIsTheUsernameAndSetPasswordToThisIsThePassword() {
        $host = 'http://www.hostname.com';
        $username = 'thisIsTheUsername';
        $password = 'thisIsThePassword';
        $h = new Apiaccount($host, $username, $password);

        $this->assertInstanceOf(Apiaccount::class, $h);
    }
}