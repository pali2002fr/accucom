<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Entity\Record;

class EntityRecordTestCase extends TestCase
{
    //All
    public function testInstanceOfRecordIsCreatedIfInitialInstanciationIsEmpty() {
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
        $h = new Record();

        $this->assertInstanceOf(Record::class, $h);
    }
}