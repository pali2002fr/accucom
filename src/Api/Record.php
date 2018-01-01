<?php
namespace Api;

use Entity\Record as entity_record;
use \SimpleXMLElement;

Class Record {
	private $phone;
	private $areacode;
	private $url;
	private $username;
	private $password;

	function __construct($host, $username, $password){
		$this->url = $host . '?username=' . $username . '&password=' . $password; 
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
   		$c = 0;
		foreach($result as $k => $v){
			if($k != 'record') continue;
   			$return[$c] = $this->createRecordEntity($c, $v);
   			$c++;
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
   		try{
   			$xml = file_get_contents( $this->url . '&areacode='. $this->getAreacode() . '&phone=' . $this->getPhone() );
	   		switch($xml){
	   			case 'invalid login': return [
										'success' 	=> true,
										'error' 	=> true,
										'message' 	=> $xml
									];
									break;
				case '': 	return [
								'success' 	=> true,
								'error' 	=> true,
								'message'	=> 'invalid'
							];
							break;
				default: $result = new SimpleXMLElement($xml); 
			   		if($result->errors){
						return [
							'success' 	=> true,
							'error' 	=> true,
							'message' 	=> (array) $result->errors
						];
					} else {
						return array(
							'success' 	=> true,
							'error' 	=> false,
							'result'	=> $this->prepareRecord($result),
							'total' 	=> (int) $result->stats->rows
						);
					}
	   		}
	   	}	
   		catch(Exception $e) {
		  	return [
				'success' 	=> true,
				'error' 	=> true,
				'message' 	=> $e->getMessage()
			];
		}
   		
   }
}