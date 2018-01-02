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

if($interval === 'NO'){
	//Do not cache the result.
	$call = new Api(
		$host,
		$username,
		$password
	);
	$call->setPhone($phone);
	$call->setAreacode($areacode);
	$d = $call->search();
	echo json_encode($d);
} else {
	//Cache the result.
	$cache = new Model();
	$d = $cache->getRecord($areacode . $phone);

error_log(print_r($d, TRUE));

	if(!$d){

		$call = new Api(
			$host,
			$username,
			$password
		);
		$call->setPhone($phone);
		$call->setAreacode($areacode);
		$d = $call->search(); 

		//Cache result in mysql
		$cache->setRecord($areacode . $phone, json_encode($d, true), $interval);
		echo json_encode($d);
	} else {
		echo $d;
	}
}


















