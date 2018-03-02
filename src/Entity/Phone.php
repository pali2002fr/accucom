<?php

namespace Entity;

class Phone implements PhoneInterface {
	public $phone;
	public $areacode;

	function __construct( 
    $areacode,
    $phone
  ){
    $this->setAreacode($areacode);
    $this->setPhone($phone);
  }

  public function getAreacode(){
    return $this->areacode;
  }

  public function setAreacode($areacode){
    if(!is_numeric($areacode) || strlen($areacode) != 3 || empty($areacode)) {
      throw new \InvalidArgumentException("Areacode is invalid.");
    }
    $this->areacode = $areacode;
  }

  public function getPhone(){
    return $this->phone;
  }

  public function setPhone($phone){
   	if(!is_numeric($phone) || strlen($phone) != 7 || empty($phone)) {
          throw new \InvalidArgumentException("Phone is invalid.");
    }
    $this->phone = $phone;
  }

  public function getFullPhone(){
    return $this->getAreacode() . $this->getPhone();
  }
}