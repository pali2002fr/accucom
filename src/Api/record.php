<?php
namespace Api;

use Entity\Record as entity_record;
use \SimpleXMLElement;

Class Record {
	private $phone;
	private $areacode;
	//const URL = "https://www.infopay.com/phptest_phone_xml.php?username=accucomtest&password=test104";
	private $url;
	private $username;
	private $password;

	function __construct($url, $username, $password){
		$this->url = $url . '?username=' . $username . '&password=' . $password; 
   }

   public function getPhone(){
   		return $this->phone;
   }

   public function getAreacode(){
   		return $this->areacode;
   }

	public function setAreacode($areacode){
   		$this->areacode = $areacode;
   }  

   public function setPhone($phone){
   		$this->phone = $phone;
   }

   private function prepareRecord($result){
   		$return = array();
   		if(is_array($result)){
   			foreach($result as $k => $v){
	   			$return[$k] = $this->createRecordEntity($k, $v);
	   		}
   		} else {
   			$return = $this->createRecordEntity(null, $result);
   		}

   		return $return;
   }

   private function createRecordEntity($k, $v){
	   	return  new entity_record(
	   		(int) $k, 
			(string) $v->firstname, 
			(string) $v->middlename, 
			(string) $v->lastname, 
			(string) $v->addressA, 
			(string) $v->addressB, 
			(string) $v->state, 
			(string) $v->age, 
			(string) $v->from,
			(string) $v->to,
			(string) $v->phone,
			(string) $v->timezone,
			(string) $v->phone_carrier,
			(string) $v->provider_type,
			(string) $v->info
		);
   }

   public function search(){

   		$xml = file_get_contents( $this->url . '&areacode='. $this->getAreacode() . '&phone=' . $this->getPhone() );
   		$result = new SimpleXMLElement($xml);

   		if($result->errors){
			return [
					'success' => true,
					'error' => true,
					'message' => (array) $result->errors
				];
		} else {
			$records = (array) $result;
			return array(
				'success' => true,
				'error' => false,
				'result' => $this->prepareRecord($records['record']),
				'total' => is_array($records['record']) ? count($records['record']) : 0
			);
		}
   }
}