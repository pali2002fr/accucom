<?php 

include("bootstrap.php");
$config = include('config.php');

use Api\Record as Api;
use Model\Record as Model;

//Handle Args
$phone 		= $_GET['phone']; 
$areacode 	= $_GET['areacode'];
$host 		= $_GET['host'];
$username 	= $_GET['username'];
$password 	= $_GET['password'];
$interval 	= $_GET['interval'];

//Error: no Phone or no Areacode
if(!$phone || !$areacode){
	echo 'Areacode or/and phone are missing';
	exit();
}

//Error: no Host or no Username or no Password
if(!$host || !$username || !$password){
	echo 'Infopay details access are missing';
	exit();
}

$apiCall = function($host, $username, $password, $phone, $areacode){
 	try {
	 	$call = new Api(
			$host,
			$username,
			$password
		);
		$call->setPhone($phone);
		$call->setAreacode($areacode);
		return $call->search();
 	}
 	catch(Exception $e){
 		echo 'Error: ' . $e->getMessage();
 	}
 };

if($interval === 'NO'){
	//Do not cache the result.
	echo json_encode($apiCall($host, $username, $password, $phone, $areacode));
} else {
	//Cache the result.
	$cache = new Model();
	$d = $cache->getRecord($areacode . $phone);
	if(!$d){
		$d = $apiCall($host, $username, $password, $phone, $areacode); 
		//Cache result in mysql
		$d = json_encode($d, true);
		$cache->setRecord($areacode . $phone, $d, $interval);
		$d = $cache->getRecord($areacode . $phone);
	}
	echo $d;
}


















