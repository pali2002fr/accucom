<?php
namespace Model;

use Entity\PhoneInterface;
use Entity\Phone;
use Config\Database;
use \PDO;

Class Record {

	public $db;

	function __construct(){
		try {
			$this->db = new \PDO(Database::DB_DNS, Database::DB_USER, Database::DB_PASS);
		} catch(\PDOException $ex) {
		    echo $ex->getMessage();
		}	
	}

	public function setRecord(PhoneInterface $phone, $record, $interval = "5 MINUTE"){
		try {
	    	$interval = "DATE_ADD(now(), INTERVAL " . $interval .")";
			$sql = "INSERT INTO `Records` (`phone`, `record`, `created_at`, `updated_at`, `expired_at`) VALUES ('" . $phone->getFullPhone() . "', '" . $record . "', now(), NULL, " . $interval . ") ON DUPLICATE KEY UPDATE `record` = '" . $record . "', `updated_at` = now(), `expired_at` = " . $interval;
	    	$affectedRows = $this->db->exec($sql);
		} catch(\PDOException $ex) {
		    echo $ex->getMessage();
		}	
	}

	public function getRecord(PhoneInterface $phone){
		try {
	    	$stmt = $this->db->query("SELECT record, expired_at, created_at, updated_at FROM `Records` WHERE phone = '" . $phone->getFullPhone() . "' AND expired_at >= now()");
	    	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	    	$res = $stmt->fetch();
	    	if($res) {
	    		return $res;
	    	}
		   	return false;
		} catch(\PDOException $ex) {
		    echo $ex->getMessage();
		}
	}

	public function deleteRecord(PhoneInterface $phone){
		try {
	    	$sql = "DELETE FROM `Records` WHERE phone = '" . $phone->getFullPhone() . "'";
	    	$affectedRows = $this->db->exec($sql);
		} catch(PDOException $ex) {
		    echo "An Error occured!";
		}
	}
}