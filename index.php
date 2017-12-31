<?php 

include("bootstrap.php");
$config = include('config.php');

use Api\Record as Api;
use Model\Record as Model;


$phone = $_GET['phone']; 
$areacode = $_GET['areacode'];
$host = $_GET['host'];
$username = $_GET['username'];
$password = $_GET['password'];
$interval = $_GET['interval'];

if(!$phone || !$areacode){
	echo 'Areacode or/and phone are missing';
	exit();
}

if(!$host || !$username || !$password){
	echo 'Infopay details access are missing';
	exit();
}

$cache = new Model();
$d = $cache->getRecord($areacode . $phone);
if(!$d){
	$call = new Api(
		$host,
		$username,
		$password
	);
	$call->setPhone($phone);
	$call->setAreacode($areacode);
	$d = $call->search(); 

	if($interval !== 'NO'){
		$cache->setRecord($areacode . $phone, json_encode($d, true), $interval);
	}
	echo json_encode($d);
} else {
	echo $d;
}












