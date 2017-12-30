<?php 

include("entity.php");

Class api {
	private $phone;
	private $areacode;
	const URL = "https://www.infopay.com/phptest_phone_xml.php?username=accucomtest&password=test104";

	function __construct(){
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
	   	return  new record(
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

   		$xml = file_get_contents( self::URL . '&areacode='. $this->getAreacode() . '&phone=' . $this->getPhone() );
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


Class Cache {

	public $db;
	function __construct(){
		$this->db = new PDO('mysql:host=localhost;port=8889;dbname=cache', 'root', 'root');
	}

	public function setCache($key, $data){
		try {
	    	$affectedRows = $this->db->exec("INSERT INTO `cache`(`phone`, `data`) VALUES ('" . $key . "', '" . $data . "')");
		} catch(PDOException $ex) {
		    echo "An Error occured!";
		}	
	}

	public function getCache($key){
		try {
	    	$stmt = $this->db->query("SELECT data FROM `cache` WHERE phone = '" . $key . "'", PDO::FETCH_ASSOC);
	    	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	    	$res = $stmt->fetch();
	    	if($res) {
	    		return $res['data'];
	    	}
		   	return false;
		} catch(PDOException $ex) {
		    echo "An Error occured!";
		}
	}
}

$phone = $_GET['phone']; 
$areacode = $_GET['areacode'];
$cache = new Cache();
$d = $cache->getCache($areacode . $phone);
if(!$d){
	$call = new api($areacode, $phone);
	$call->setPhone($phone);
	$call->setAreacode($areacode);
	$d = $call->search();
	$cache->setCache($areacode . $phone, json_encode($d, true));
	echo json_encode($d);
} else {
	echo $d;
}












