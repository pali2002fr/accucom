<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Entity\Phone;

class EntityPhoneTestCase extends TestCase
{
	/*
    public function testApiSearch() {
    	$host =  'https://www.infopay.com/phptest_phone_xml.php';
		$username = 'accucomtest';
		$password = 'test104';

    	$i = new Api\Record($host, $username, $password);
    	$i->setPhone('8755813');
    	$i->setAreacode('617');
    	
    	var_dump($i->search()); 
    	//var_dump($cache);
    	//die;
        //$this->assertTrue(true);
    } 
    */

    //Phone
    public function testExpectedExceptionIsRaisedIfSetPhoneZero() {
        $this->expectException(\InvalidArgumentException::class);
        $areacode = 0;
        $phone = 8755813;
        $p = new Phone($areacode, $phone);

        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetPhoneNumericTooLong() {
        $this->expectException(\InvalidArgumentException::class);
        $areacode = 617;
    	$phone = 875565756;
    	$p = new Phone($areacode, $phone);

    	$this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetPhoneNotNumeric() {
        $this->expectException(\InvalidArgumentException::class);
        $areacode = 617;
        $phone = 'mynotnumericphonenumber';
        $p = new Phone($areacode, $phone);

        $this->fail('InvalidArgumentException was not raised');
    }

    //Areacode
    public function testExpectedExceptionIsRaisedIfSetAreacodeZero() {
        $this->expectException(\InvalidArgumentException::class);
        $areacode = 0;
        $phone = 8755813;
        $p = new Phone($areacode, $phone);

        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetAreacodeNumericTooLong() {
        $this->expectException(\InvalidArgumentException::class);
        $areacode = 1977;
        $phone = 8755813;
        $p = new Phone($areacode, $phone);

        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedExceptionIsRaisedIfSetAreacodeNotNumeric() {
        $this->expectException(\InvalidArgumentException::class);
        $areacode = 'mynotnumericareacodenumber';
        $phone = 8755813;
        $p = new Phone($areacode, $phone);

        $this->fail('InvalidArgumentException was not raised');
    }
}