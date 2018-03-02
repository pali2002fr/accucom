<?php 

namespace Entity;

Class Record implements RecordInterface {
   public $id;
	public $firstname;
   public $middlename;
   public $lastname; 
   public $addressA;
   public $addressB;
   public $state;
   public $age;
   public $from;
   public $to; 
   public $phone;
   public $timezone;
   public $phone_carrier; 
   public $provider_type;


	function __construct( 
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
      $info
   ){
      $this->setId($id);
      $this->setFirstname($firstname);
      $this->setMiddlename($middlename);
      $this->setLastname($lastname);
      $this->setAddressA($addressA); 
      $this->setAddressB($addressB);
      $this->setState($state);
      $this->setAge($age);
      $this->setFrom($from);
      $this->setTo($to);
      $this->setPhone($phone); 
      $this->setTimezone($timezone);
      $this->setPhoneCarrier($phone_carrier);
      $this->setProviderType($provider_type);
      $this->setInfo($info);

   }

   public function getId(){
      return $this->id;
   }

   public function setId($id = 0){
      if(!is_numeric($id)){
         throw new \InvalidArgumentException("Id is invalid.");
      }
      $this->id = $id;
   }

   public function getPhone(){
   	return $this->phone;
   }

   public function setPhone($phone = null){
      $pattern = '/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/';
      if(!preg_match($pattern, $phone, $matches, PREG_OFFSET_CAPTURE)){
         throw new \InvalidArgumentException("Phone is invalid.");
      }
      $this->phone = $phone;
   }

   public function getFirstname(){
      return $this->firstname;
   }

   public function setFirstname($firstname = ''){
      if(!is_string($firstname)){
         throw new \InvalidArgumentException("Firstname is invalid.");
      }
      $this->firstname = $firstname;
   } 

   public function getMiddlename(){
      return $this->middlename;
   }

   public function setMiddlename($middlename = ''){
      if(!is_string($middlename)){
         throw new \InvalidArgumentException("Middlename is invalid.");
      }
      $this->middlename = $middlename;
   }   

   public function getLastname(){
      return $this->lastname;
   }

   public function setLastname($lastname = ''){
      if(!is_string($lastname)){
         throw new \InvalidArgumentException("Lastname is invalid.");
      }
      $this->lastname = $lastname;
   }   

   public function getAddressA(){
      return $this->addressA;
   }

   public function setAddressA($addressA = ''){
      if(!is_string($addressA)){
         throw new \InvalidArgumentException("Address A is invalid.");
      }
      $this->addressA = $addressA;
   } 

   public function getAddressB(){
      return $this->addressA;
   }

   public function setAddressB($addressB = ''){
      if(!is_string($addressB)){
         throw new \InvalidArgumentException("Address B is invalid.");
      }
      $this->addressB = $addressB;
   } 

   public function getState(){
      return $this->state;
   }

   public function setState($state = ''){
      if(!is_string($state)){
         throw new \InvalidArgumentException("State is invalid.");
      }
      $this->state = $state;
   } 

   public function getAge(){
      return $this->age;
   }

   public function setAge($age = 0){
      if(!is_numeric($age) && !is_string($age)){
         throw new \InvalidArgumentException("Age is invalid.");
      }
      $this->age = $age;
   } 

   public function getFrom(){
      return $this->from;
   }

   public function setFrom($from = null){
      $this->from = $from;
   } 

   public function getTo(){
      return $this->to;
   }

   public function setTo($to = null){
      $this->to = $to;
   } 

   public function getTimezone(){
      return $this->timezone;
   }

   public function setTimezone($timezone = ''){
      if(!is_string($timezone)){
         throw new \InvalidArgumentException("Timezone is invalid.");
      }
      $this->timezone = $timezone;
   }

   public function getPhoneCarrier(){
      return $this->phone_carrier;
   }

   public function setPhoneCarrier($phone_carrier = ''){
      if(!is_string($phone_carrier)){
         throw new \InvalidArgumentException("Phone Carrier is invalid.");
      }
      return $this->phone_carrier = $phone_carrier;
   }

   public function getProviderType(){
      return $this->provider_type;
   }

   public function setProviderType($provider_type = ''){
      if(!is_string($provider_type)){
         throw new \InvalidArgumentException("Provider Type is invalid.");
      }
      return $this->provider_type = $provider_type;
   }

    public function getInfo(){
      return $this->info;
   }

   public function setInfo($info = ''){
      if(!is_string($info)){
         throw new \InvalidArgumentException("Info is invalid.");
      }
      return $this->info = $info;
   }
}










