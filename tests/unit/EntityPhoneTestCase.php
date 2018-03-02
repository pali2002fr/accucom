<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Entity\Phone;

class EntityPhoneTestCase extends TestCase
{
    protected $p;
    public function setUp()
    {
        $areacode = 617;
        $phone = 8755813;
        $this->p = new Phone($areacode, $phone);
    }

    //Phone
    public function testExpectedExceptionIsRaisedIfSetPhoneZero() {
        $this->expectException(\InvalidArgumentException::class);
        $this->p->setPhone(0);
        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetPhoneNumericTooLong() {
        $this->expectException(\InvalidArgumentException::class);
        $this->p->setPhone(875565756);
    	$this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetPhoneNotNumeric() {
        $this->expectException(\InvalidArgumentException::class);
        $this->p->setPhone('mynotnumericphonenumber');
        $this->fail('InvalidArgumentException was not raised');
    }

    //Areacode
    public function testExpectedExceptionIsRaisedIfSetAreacodeZero() {
        $this->expectException(\InvalidArgumentException::class);
        $this->p->setAreacode(0);
        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetAreacodeNumericTooLong() {
        $this->expectException(\InvalidArgumentException::class);
        $this->p->setAreacode(1977);
        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetAreacodeNotNumeric() {
        $this->expectException(\InvalidArgumentException::class);
        $this->p->setAreacode('mynotnumericareacodenumber');
        $this->fail('InvalidArgumentException was not raised');
    }
}