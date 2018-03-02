<?php

namespace Entity;

interface RecordInterface {
	public function getId();
   public function setId($id);

   public function getPhone();
   public function setPhone($phone);

   public function getMiddlename();
   public function setMiddlename($middlename);

   public function getLastname();
   public function setLastname($lastname); 

   public function getAddressA();
   public function setAddressA($addressA);

   public function getAddressB();
   public function setAddressB($addressA);

   public function getState();
   public function setState($state);

   public function getAge();
   public function setAge($age);

   public function getFrom();
   public function setFrom($from);

   public function getTo();
   public function setTo($to);

   public function getTimezone();
   public function setTimezone($timezone);

   public function getPhoneCarrier();
   public function setPhoneCarrier($phone_carrier);

   public function getProviderType();
   public function setProviderType($provider_type);

   public function getInfo();
   public function setInfo($info);
}