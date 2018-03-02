<?php
namespace Api;

use Entity\Record as entity_record;
use Entity\Phone;
use Entity\PhoneInterface;
use Entity\ApiaccountInterface;
use \SimpleXMLElement;

Class Record {
	private $url;
	private $username;
	private $password;

	function __construct(ApiaccountInterface $apiCredentials){
		$this->url = $apiCredentials->getHost() . '?username=' . $apiCredentials->getUsername() . '&password=' . $apiCredentials->getPassword(); 
   	}

   /*
	Create list of Record entity
   */
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

	/*
	Create a Record entity
   */
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

   /*
	Reach Infopay api to look for any matching phone info
   */
    public function search(PhoneInterface $phone){
   		try{
   			$xml = file_get_contents( $this->url . '&areacode='. $phone->getAreacode() . '&phone=' . $phone->getPhone() );
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