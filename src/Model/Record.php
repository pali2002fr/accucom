<?php
namespace Model;

use \PDO;

Class Record {

	public $db;
	function __construct(){
		try {
			$config = include('config.php');
			$this->db = new PDO($config['database']['dns'], $config['database']['username'], $config['database']['password']);
		} catch(PDOException $ex) {
		    echo "An connectionn Error occured!";
		}	
	}

	public function setRecord($key, $record, $interval = "5 MINUTE"){
		try {
	    	$interval = "DATE_ADD(now(), INTERVAL " . $interval .")";
			$sql = "INSERT INTO `Records` (`phone`, `record`, `created_at`, `updated_at`, `expired_at`) VALUES ('" . $key . "', '" . $record . "', now(), NULL, " . $interval . ") ON DUPLICATE KEY UPDATE `record` = '" . $record . "', `updated_at` = now(), `expired_at` = " . $interval;
	    	$affectedRows = $this->db->exec($sql);
		} catch(PDOException $ex) {
		    echo "An Error occured!";
		}	
	}

	public function getRecord($key){
		try {
	    	$stmt = $this->db->query("SELECT record, expired_at, created_at, updated_at FROM `Records` WHERE phone = '" . $key . "' AND expired_at >= now()");
	    	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	    	$res = $stmt->fetch();
	    	if($res) {
	    		return $res;
	    	}
		   	return false;
		} catch(PDOException $ex) {
		    echo "An Error occured!";
		}
	}
}