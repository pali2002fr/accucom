<?php 

namespace Entity;

Class Record {
   private $id;
	private $firstname;
   private $middlename;
   private $lastname; 
   private $addressA;
   private $addressB;
   private $state;
   private $age;
   private $from;
   private $to; 
   private $phone;
   private $timezone;
   private $phone_carrier; 
   private $provider_type;


	function __construct($id = 0, $firstname, $middlename, $lastname, $addressA, $addressB, $state, $age, $from, $to, $phone, $timezone, $phone_carrier, $provider_type, $info){
      $this->id = $id;
      $this->firstname = $firstname;
      $this->middlename = $middlename;
      $this->lastname = $lastname;
      $this->addressA = $addressA; 
      $this->addressB = $addressB;
      $this->state = $state;
      $this->age = $age;
      $this->from = $from;
      $this->to = $to;
      $this->phone = $phone; 
      $this->timezone = $timezone;
      $this->phone_carrier = $phone_carrier;
      $this->provider_type = $provider_type;
      $this->info = $info;

   }

   public function getId(){
         return $this->id;
   }

   public function setId($id){
         $this->id = $id;
   }

   public function getPhone(){
   		return $this->phone;
   }

   public function setPhone($phone){
         $this->phone = $phone;
   }

   public function getMiddlename(){
         return $this->middlename;
   }

   public function setMiddlename($middlename){
         $this->middlename = $middlename;
   }   

   public function getLastname(){
         return $this->lastname;
   }

   public function setLastname($lastname){
         $this->lastname = $lastname;
   }   

   public function getAddressA(){
         return $this->addressA;
   }

   public function setAddressA($addressA){
         $this->addressA = $addressA;
   } 

   public function getAddressB(){
         return $this->addressA;
   }

   public function setAddressB($addressA){
         $this->addressA = $addressA;
   } 

   public function getState(){
         return $this->state;
   }

   public function setState($state){
         $this->state = $state;
   } 

   public function getAge(){
         return $this->age;
   }

   public function setAge($age){
         $this->age = $age;
   } 

   public function getFrom(){
         return $this->from;
   }

   public function setFrom($from){
         $this->from = $from;
   } 

   public function getTo(){
         return $this->to;
   }

   public function setTo($to){
         $this->to = $to;
   } 

   public function getTimezone(){
         return $this->timezone;
   }

   public function setTimezone($timezone){
         $this->timezone = $timezone;
   }

   public function getPhoneCarrier(){
         return $this->phone_carrier;
   }

   public function setPhoneCarrier($phone_carrier){
         return $this->phone_carrier = $phone_carrier;
   }

   public function getProviderType(){
         return $this->provider_type;
   }

   public function setProviderType($provider_type){
         return $this->provider_type = $provider_type;
   }

    public function getInfo(){
         return $this->info;
   }

   public function setInfo($info){
         return $this->info = $info;
   }

}










