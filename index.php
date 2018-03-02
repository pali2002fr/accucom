<?php 
require_once __DIR__ . '/vendor/autoload.php';

use Model\Record as model_record;
use Api\Record as api_record;
use Entity\Phone;
use Entity\PhoneInterface;
use Entity\Apiaccount;
use Entity\ApiaccountInterface;
use Helper\Json as helper_json;
use Helper\Record as helper_record;
use Config\Accucom;

//Handle Args
$phone 		= isset($_GET['phone']) ? $_GET['phone'] : ''; 
$areacode 	= isset($_GET['areacode']) ? $_GET['areacode'] : '';

//Error: no Phone or no Areacode
if(
	empty($phone) || 
	empty($areacode) || 
	strlen($phone) != 7 || 
	strlen($areacode) != 3
){
	echo 'Areacode or/and phone are missing';
	exit();
}
//Set Phone
$realPhone = new Phone($areacode, $phone);

$host 		= isset($_GET['host']) ? $_GET['host'] : Accucom::ACCUCOM_HOST;
$username 	= isset($_GET['username']) ? $_GET['username'] : Accucom::ACCUCOM_USER;
$password 	= isset($_GET['password']) ? $_GET['password'] : Accucom::ACCUCOM_PASS;
$interval 	= isset($_GET['interval']) ? $_GET['interval'] : 'NO';

//Error: no Host or no Username or no Password
if(empty($host) || empty($username) || empty($password)){
	echo 'Infopay details access are missing';
	exit();
}

//Set API Account credentials
$apiAccountCredentials = new Apiaccount($host, $username, $password);

$api = new api_record($apiAccountCredentials);

if($interval === 'NO'){

	//Do not cache the result.
	echo json_encode([
		'created_at' => null,
		'updated_at' => null,
		'expired_at' => null,
		'remainder' => null,
		'record' => $api->search($realPhone)	
	]);
} else {
	//Cache the result.
	$cache = new model_record();
	$d = $cache->getRecord($realPhone);

	if(!$d){
		$d = $api->search($realPhone); 
		//Cache result in mysql
		$d = json_encode($d, true);
		$cache->setRecord($realPhone, $d, $interval);
		$d = $cache->getRecord($realPhone);
	}

	$d['remainder'] = helper_record::remainder($d['expired_at']);
	echo helper_json::decodeEncodeJson($d['record']);
}


















