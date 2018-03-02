<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Entity\Record;

class EntityRecordTestCase extends TestCase
{
    protected aRecord;
    protected function setUp()
    {
        $id = NULL; 
        $firstname = "ThisIsTheUsername";
        $middlename = "ThisIsTheMiddlename";
        $lastname = "ThisIsTheLastname";
        $addressA = "ThisIsTheAddressA";
        $addressB = "ThisIsTheAddressB";
        $state = "ThisIsTheState";
        $age = 10;
        $from = NULL; 
        $to = NULL;
        $phone = "6179875657"; 
        $timezone = "2018-02-28T07:18:22-05:00";
        $phone_carrier =  "ThisIsThePhoneCarrier";
        $provider_type = "ThisIsTheProviderType";
        $info = "ThisIsTheInfo";

        $this->aRecord = new Record(
            $id,
            $firstname,
            $middlename,
            $lastname,
            $addressA,
            $addressB,
            $state,
            $age,
            $from,
            $to,
            $phone,
            $timezone,
            $phone_carrier,
            $provider_type,
            $info,
        );
    }
    //Id
    public function testExpectedExceptionIsRaisedIfSetIdToNotNumeric() {
        $this->expectException(\InvalidArgumentException::class);
        $this->aRecord->setId('noneNumeric');
        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedInstanceOfRecordIfSetIdToNumeric() {
        $this->aRecord->setId(1);
        $expected = $this->aRecord->getId();
        $this->assertSame(1, $expected);
    }

    //Firstname
    public function testExpectedExceptionIsRaisedIfSetFirstnameToNumeric() {
        $this->expectException(\InvalidArgumentException::class);
        $this->aRecord->setFirstname(2018);
        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedInstanceOfRecordIfSetFirstnameToString() {
        $noneNumeric = 'noneNumeric';
        $this->aRecord->setFirstname($noneNumeric);
        $expected = $this->aRecord->getFirstname();
        $this->assertSame($noneNumeric, $expected);
    }

    //Lastname
    public function testExpectedExceptionIsRaisedIfSetLastnameToNumeric() {
        $this->expectException(\InvalidArgumentException::class);
        $this->aRecord->setLastname(2018);
        $this->fail('InvalidArgumentException was not raised');
    }

    public function testExpectedInstanceOfRecordIfSetLastnameToString() {
        $noneNumeric = 'noneNumeric';
        $this->aRecord->setLastname($noneNumeric);
        $expected = $this->aRecord->getFirstname();
        $this->assertSame($noneNumeric, $expected);
    }
}